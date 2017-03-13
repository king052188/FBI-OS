<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function index() {
        return view('test.login');
    }

    public function account_kit_response(Request $request) {
        return Helper::facebook_account_kit_v2($request);
    }
}
