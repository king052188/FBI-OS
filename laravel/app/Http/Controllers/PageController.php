<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landing_page($sub = null) {

        if($sub != null) {

            $staging_session = $sub; //Helper::sub_domain_validation($sub);
            if($staging_session == "staging") {
                $staging = ["staging" => true];
                return redirect("/")
                    ->withCookie(\Cookie::make('staging_session', $staging, Helper::$cookie_life_default));
            }
            else if($staging_session == "www") {
                return redirect("http://web.". Helper::$domain);
            }
            else {
                return view('layout.promo');
            }

        }
        return redirect("http://www.". Helper::$domain);

    }
}
