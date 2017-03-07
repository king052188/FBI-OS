<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use DB;


class MemberController extends Controller
{
    //

    public function member_sign_in_index(Request $request) {

        $helper = Helper::ssl_secured($request);
        Helper::flushCookies();
        return view('member.signin', compact('helper'));
    }

    public function member_sign_in_validation(Request $request) {

        $account = $request->account;
        $password = $request->password;

        $selectQuery = Helper::get_member_information($account);
        if( COUNT($selectQuery) > 0 ) {
            $encrypted = Helper::get_random_password($password);
            if($selectQuery[0]->password != $encrypted["hash_password"]) {
                return redirect('/login')->with('message', 'Please enter your valid account.');
            }
        }

        return redirect('/dashboard');
    }

    public function member_url_validation($endorser_id = null) {

        if($endorser_id != null) {
            $endorser_account = Member::where("hash_code", "=", $endorser_id)->first();
            if(count($endorser_account) == 0) {
                return view('layout.404', compact('helper'));
            }

            return redirect('/sign-up/')
                ->withCookie(\Cookie::make('endorsement_session', $endorser_account, Helper::$cookie_life_default));
        }

        return redirect('/sign-up/');
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

        $endorser = Helper::get_member_information($request->endorsed_by);
        $specialist = Helper::get_member_information($request->specialist);
        
        if($endorser == null) {
            return redirect('/sign-up')->with('message', 'Oops, Invalid endorser account name.');
        }

        $specialist_uid = 0;
        if($specialist != null) {
            $specialist_uid = $specialist[0]->Id;
        }

        $hash_code = Helper::get_random_password($request->email);
        $member  = new Member();
        $member-> hash_code = $hash_code["hash_password"];
        $member-> first_name = $request->first_name;
        $member-> middle_name = $request->middle_name;
        $member-> last_name = $request->last_name;
        $member-> birth_date = $request->date_of_birth;
        $member-> gender = $request->gender;
        $member-> email = $request->email;
        $member-> mobile = $request->mobile;
        $member-> endorse_uid = $endorser[0]->Id;
        $member-> specialist_uid = $specialist_uid;
        $member-> status = 1; // default 1, meaning member is not yet verified. 2 is verified!
        $result = $member->save();

        if($result) {
            return redirect('/dashboard');
        }
        return redirect('/sign-up')->with('message', 'Oops, Something went wrong. Please try again');
    }
}
