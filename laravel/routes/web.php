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

Route::get('/', function () {
    return view('layout.maintenance');
});

//Route::get('/', 'TestController@index');

Route::post('/account-kit/process', 'TestController@account_kit_response');


Route::get('/login', 'MemberController@member_sign_in_index');
Route::post('/login/processing', 'MemberController@member_sign_in_validation');

Route::get('/endorsement/link/{endorser?}', 'MemberController@member_url_validation');
Route::get('/sign-up', 'MemberController@member_sign_up_index');
Route::post('/sign-up/processing', 'MemberController@member_sign_up_execute');

Route::get('/dashboard', 'MemberController@dashboard_index');
Route::get('/settings', 'MemberController@settings_index');
Route::post('/settings/change-password', 'MemberController@settings_change_password');
Route::get('/logout', 'MemberController@member_sign_out_process');





