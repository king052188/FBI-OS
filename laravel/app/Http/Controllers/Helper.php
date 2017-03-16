<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Helper extends Controller
{
    //
    public static $cookie_life_default = 3600 / 2;
    public static $cookie_life_forever = 2000000000;

    public static $facebook_app_id = "239866523142614";
    public static $app_secret = "99647c4751d6afe5a54cbc1d4c20773b";
    public static $account_kit_api_version = "v1.1";

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

    public static function get_member_information($account) {
        $random = DB::select("
                  SELECT * FROM member_table 
                  WHERE hash_code = '{$account}' OR username = '{$account}' 
                  OR email = '{$account}' OR mobile = '{$account}';
        ");
        if( COUNT($random) > 0 ) {
            return $random;
        }
        return null;
    }

    public static function get_total_connected($uid) {
        $total = DB::select("
                  SELECT COUNT(*) AS total_conntected 
                  FROM member_table WHERE endorse_uid = {$uid}
        ");

        return $total[0]->total_conntected;
    }

    public static function post_email_send($uid = 3, $temp = "FBI.Notification", $arr = array()) {

        if( count($arr) == 0) {
            return false;
        }

        $name = str_replace(" ", "%20", $arr["name"]);
        $to = str_replace(" ", "%20", $arr["to"]);
        $subject = str_replace(" ", "%20", $arr["subject"]);
        $message = str_replace(" ", "%20", $arr["message"]);

        $query = "http://www.fbi-ph.org:2100/mail/post/email?id={$uid}&name={$name}&email={$to}&subject={$subject}&message={$message}&temp_name={$temp}";

        $result = Helper::do_curl($query);

        return $result;
    }

    // Method to send Get request to url
    public static function do_curl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $data;
    }

    public static function do_curl_v2($url) {
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, 1);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
        curl_setopt($ch,CURLOPT_TIMEOUT, 20);
        $response = curl_exec($ch);
        curl_close ($ch);
        $data = json_decode($response, true);
        return $data;
    }

    public static function facebook_account_kit_v2(Request $request) {

        // Initialize variables
        $app_id = "239866523142614";
        $secret = "99647c4751d6afe5a54cbc1d4c20773b";
        $version = "v1.1";
        $code = $request['code'];

        // Exchange authorization code for access token

        $token_exchange_url = "https://graph.accountkit.com/{$version}/access_token?grant_type=authorization_code&code={$code}&access_token=AA|{$app_id}|{$secret}";

        $data = Helper::do_curl($token_exchange_url);

        dd($token_exchange_url);

        $user_id = $data['id'];
        $user_access_token = $data['access_token'];
        $refresh_interval = $data['token_refresh_interval_sec'];


        // Get Account Kit information
        $me_endpoint_url = 'https://graph.accountkit.com/'.$version.'/me?'.
            'access_token=EMAWeZBzx5JVIZB9yPuORRZCpClzs1lSubE8TxCaUTrZAzBwZCWUUSQVtGtwVNoO8MAyXiy0Pt9JNeTZBkFzMArw4g2T3pRSt6ZB1cvZBdHI9V2rvPIYYSpRIwaiQqS0xMTvZBpGRwyIzv2xPebZAqFD28sTSIRJSKsXw8sZD';

        $data = Helper::do_curl($me_endpoint_url);
        $phone = isset($data['phone']) ? $data['phone']['number'] : '';
        $email = isset($data['email']) ? $data['email']['address'] : '';

        return array(
            "phone_number" => $phone,
            "email_address" => $email
        );

    }
}
