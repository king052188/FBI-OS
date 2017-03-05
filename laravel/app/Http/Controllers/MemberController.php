<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;


class MemberController extends Controller
{
    //

    public function member_url_validation($endorser_id = null) {

        if($endorser_id != null) {
            $endorser_account = Member::where("hash_code", "=", $endorser_id)->first();
            if(count($endorser_account) == 0) {
                return view('layout.404', compact('helper'));
            }

            return redirect('/sign-up/')
                ->withCookie(\Cookie::make('fbi_session', $endorser_account, Helper::$cookie_life_default));
        }

        return redirect('/sign-up/');
    }

    public function member_sign_up_index(Request $request, $endorser_id = null) {

        $helper = Helper::ssl_secured($request);

        $endorser_account = Helper::getCookies();

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
