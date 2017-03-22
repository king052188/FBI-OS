<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['domain' => '{sub}.fbi-ph.dev'], function () {

    Route::get('user/', function ($sub) {

        dd($sub);

        if($sub == "staging") {

            $staging_session = \App\Http\Controllers\Helper::getCookies('staging_session');

            if($staging_session == null) {

                $staging = ["staging" => true];

                return redirect('/')
                    ->withCookie(\Cookie::make('staging_session', $staging, \App\Http\Controllers\Helper::$cookie_life_default));
            }

        }

        return view('layout.promo');

    });
});

Route::get('/', function () {

    return view('layout.promo');
});

Route::get('/account-kit', 'TestController@index');
Route::post('/account-kit/process', 'TestController@account_kit_response');
Route::get('/account-kit/process/v2/{token}', 'TestController@account_kit_token');


Route::get('/login', 'MemberController@member_sign_in_index');
Route::post('/login/processing', 'MemberController@member_sign_in_validation');
Route::any('/login/execute/v2', 'MemberController@member_sign_in_validation_v2');

Route::get('/endorsement/link/{endorser?}', 'MemberController@member_url_validation');
Route::get('/sign-up', 'MemberController@member_sign_up_index');
Route::post('/sign-up/processing', 'MemberController@member_sign_up_execute');

Route::get('/dashboard', 'MemberController@dashboard_index');
Route::get('/edit-profile', 'MemberController@edit_profile_index');
Route::get('/payment', 'MemberController@payment_index');
Route::get('/settings', 'MemberController@settings_index');
Route::post('/settings/change-password', 'MemberController@settings_change_password');
Route::get('/logout', 'MemberController@member_sign_out_process');





