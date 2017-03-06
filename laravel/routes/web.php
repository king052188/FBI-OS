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
    return view('welcome');
});

Route::get('/login', 'MemberController@member_sign_in_index');
Route::post('/login/processing', 'MemberController@member_sign_in_validation');
Route::get('/endorsement/link/{endorser?}', 'MemberController@member_url_validation');
Route::get('/sign-up/{endorser?}', 'MemberController@member_sign_up_index');
