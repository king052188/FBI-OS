<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Helper extends Controller
{
    //
    public static $cookie_life_default = 3600 / 2;
    public static $cookie_life_forever = 2000000000;

    public static function ssl_secured(Request $request) {
        $ssl = null;
        if ($request->server('HTTP_X_FORWARDED_PROTO') == 'https')
        {
            $ssl = ["status" => true];
        }
        else
        {
            $ssl = ["status" => false];
        }
        return $ssl;
    }

    public static function getCookies($cookies_name = "fbi_session")
    {
        $data = \Cookie::get($cookies_name);

        if($data == null) {
            return null;
        }

        if(count($data) == 0) {
            return null;
        }

        return $data;
    }

    public static function flushCookies($cookies_name = "fbi_session") {
        \Cookie::forget($cookies_name);
        \Cookie::queue(\Cookie::forget($cookies_name));

        \Cache::flush();
    }

    public static function get_random_password($value = null) {
        $random = mt_rand(10, 727379969);
        if($value == null) {
            $value = $random;
        }
        $result = md5('@BC12abc' . $value);
        return array("new_password" => $value, "hash_password" => $result);
    }
}
