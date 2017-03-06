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

        $selectQuery = DB::select("SELECT * FROM member_table WHERE username = '{$account}' OR email = '{$account}' OR mobile = '{$account}';");
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

    public function member_sign_up_index(Request $request, $endorser_id = null) {

        $helper = Helper::ssl_secured($request);

        $endorser_account = Helper::getCookies('endorsement_session');

        return view('member.signup', compact('helper', 'endorser_account'));
    }

    public function member_sign_up_execute(Request $request) {

        $member  = new Member();
        $member-> first_name = "";
        $member-> middle_name = "";
        $member-> last_name = "";
        $member-> birth_date = "";
        $member-> gender = "";
        $member-> email = "";
        $member-> mobile = "";
        $member-> sponsor_a_uid = "";
        $member-> sponsor_b_uid = "";
        $member-> status = 1; // default 1, meaning member is not yet verified. 2 is verified!
        $result = $member->save();

    }
}
