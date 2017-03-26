<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Member;

class TestController extends Controller
{
    //

    public function index() {
        return view('test.login');
    }

    public function account_kit_response(Request $request) {
        return Helper::facebook_account_kit_v2($request);
    }

    public function account_kit_token($token) {
        return Helper::facebook_token($token);
    }

    public function re_create_temp_username() {

        $member = Member::get()->toArray();
        
        for($i = 0; $i < COUNT($member); $i++) {

            $uid = $member[$i]["Id"];
            $first_name = $member[$i]["first_name"];

            $temp_username = preg_replace('/\s+/', '', strtolower($first_name)) .".". $uid;
            $add_temp_username = Member::where("Id", "=", $uid)
                ->update(
                    array("username" => $temp_username)
                );
        }

        return array("Result" => "DONE");
    }
}
