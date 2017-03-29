<?php

namespace App\Http\Controllers;

use App\Exceptions\Handler;
use Illuminate\Http\Request;
use App\Member;
use DB;


class MemberController extends Controller
{
    // login processing
    public function member_sign_in_index(Request $request) {
        $helper = Helper::ssl_secured($request);
        $user = Helper::getCookies();
        if($user != null) {
            return redirect('/dashboard');
        }

        return view('member.signin', compact('helper'));
    }

    public function member_sign_in_validation(Request $request) {
        $account = $request->account;
        $password = $request->password;

        $member_information = Helper::get_member_information($account);
        if( COUNT($member_information) > 0 ) {
            $encrypted = Helper::get_random_password($password);
            if($member_information[0]->password != $encrypted["hash_password"]) {
                return redirect('/login')->with('message', 'Please enter your valid account.');
            }
        }

        return redirect('/dashboard')
            ->withCookie(\Cookie::make('fbi_session', $member_information, Helper::$cookie_life_default));
    }

    public function member_sign_in_validation_v2(Request $request) {
        $account = $request->code;
        $member_information = Helper::get_member_information($account);
        if( COUNT($member_information) > 0 ) {
            return redirect('/dashboard')
                ->withCookie(\Cookie::make('fbi_session', $member_information, Helper::$cookie_life_default));
        }
        return redirect('/login')->with('message', 'Please enter your valid account.');
    }
    // end login processing

    // registration processing
    public function member_url_validation(Request $request, $endorser_id = null) {
        $helper = Helper::ssl_secured($request);

        $endorser_account = Member::where("hash_code", "=", $endorser_id)->first();

        if(count($endorser_account) == 0) {
            return view('layout.404', compact('helper'));
        }
        else {
            return redirect('/sign-up/')
                ->withCookie(\Cookie::make('endorsement_session', $endorser_account, Helper::$cookie_life_default));
        }
    }

    public function member_sign_up_index(Request $request) {
        $helper = Helper::ssl_secured($request);
        $endorser_account = Helper::getCookies('endorsement_session');
        return view('member.signup', compact('helper', 'endorser_account'));
    }

    public function member_sign_up_execute(Request $request) {
        if((int)$request->gender == 0) {
            return redirect('/sign-up')->with('message', 'Oops, Please select your gender.');
        }

        $specialist = Helper::get_member_information($request->specialist);

        $endorser_id = 0;;
        $endorser = Helper::getCookies('endorsement_session');
        if($endorser == null) {
            $endorser = Helper::get_member_information($request->endorsed_by);
            if($endorser == null) {
                return redirect('/sign-up')->with('message', 'Oops, Invalid endorser account name.');
            }
            $endorser_id = $endorser[0]->Id;
        }
        else {
            $endorser_id = $endorser["Id"];
        }

        $specialist_uid = 0;
        if($specialist != null) {
            $specialist_uid = $specialist[0]->Id;
        }

        $password_code = Helper::get_random_password();

        $member  = new Member();
        $member->password = $password_code["hash_password"];
        $member->first_name = $request->first_name;
        $member->middle_name = $request->middle_name;
        $member->last_name = $request->last_name;
        $member->birth_date = $request->date_of_birth;
        $member->gender = $request->gender;
        $member->email = $request->email;
        $member->mobile = $request->mobile;
        $member->endorse_uid = $endorser_id;
        $member->specialist_uid = $specialist_uid;
        $member->status = 1; // default 1, meaning member is not yet verified. 2 is verified!
        $result = $member->save();
        $issued_uid = $member->id;

        if($result) {

            $hash_code = Helper::get_random_password($request->email . $issued_uid);

            $user_hash_code = $hash_code["hash_password"];

            $temp_username = preg_replace('/\s+/', '', strtolower($request->first_name)) .".". $issued_uid;

            $add_temp_username = Member::where("Id", "=", $issued_uid)
                ->update(
                  array(
                      "hash_code" => $user_hash_code,
                      "username" => $temp_username
                  )
                );

            $h = Helper::post_password_email_send($request->first_name, $request->email, $user_hash_code, $password_code["new_password"]);

            if($h["Status"] == 200) {
                return redirect('/login');
            }

            return redirect('/sign-up')->with('message', 'Oops, Error sending your account information, Please contact FBI Admin.');

        }
        return redirect('/sign-up')->with('message', 'Oops, Something went wrong. Please try again');
    }
    // end registration processing
    
    public function dashboard_index(Request $request) {
        $helper = Helper::ssl_secured($request);
        $user = Helper::getCookies();

        if($user == null) {
            return redirect('/logout');
        }

        $total_connected = Helper::get_total_connected($user[0]->Id);
        $statistics = array(
            "Connected" => $total_connected,
            "PBAT" => 0,
            "Damayan" => 0
        );

        return view('member.dashboard', compact('helper', 'user', 'statistics'));
    }

    public function edit_profile_index(Request $request) {
        $helper = Helper::ssl_secured($request);

//        $staging_session = $member = Helper::getCookies('staging_session');
//        if($staging_session == null) {
//            return view('layout.404', compact('helper'));
//        }

        $page = ["page" => "basic"];

        if( IsSet( $request->page ) ) {

            if($request->page == "basic") {
                return view('member.profile_basic', compact('helper', 'page'));
            }

            if($request->page == "addition") {
                return view('member.profile_addition', compact('helper', 'page'));
            }
        }

        return view('layout.404', compact('helper'));
    }

    public function payment_index(Request $request) {
        $helper = Helper::ssl_secured($request);

        $page = ["page" => "payment"];

        return view('member.payment', compact('helper', 'page'));

    }

    public function settings_index(Request $request) {
        $helper = Helper::ssl_secured($request);

        $page = ["page" => "settings"];

        return view('member.settings', compact('helper', 'page'));
    }

    public function settings_change_password(Request $request) {
        $member = Helper::getCookies();
        if($member == null) {
            return redirect('/logout');
        }

        $current_password = $request->current_password;
        $new_password = $request->new_password;

        $encrypted1 = Helper::get_random_password($current_password);
        $encrypted2 = Helper::get_random_password($new_password);

        $user = Member::where("Id", "=", $member[0]->Id);
        $user_get = $user->first();

        $result = false;
        if( $user_get->password == $encrypted1["hash_password"] ) {
            $result = $user->update(["password" => $encrypted2["hash_password"]]);
        }

        if($result) {
            return redirect('/logout');
        }

        return redirect('/settings')->with('message', 'Please enter your valid password.');
    }

    public function member_sign_out_process(Request $request) {
        Helper::flushCookies();
        Helper::flushCookies("endorsement_session");
        return redirect("/login");
    }
}
