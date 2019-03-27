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
    return redirect()->action('HomeController@index');
});

/**
 * Custom Auth Routes
 */

// Login Routes...
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
Route::post('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset', ['as' => 'password.request', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/reset', ['as' => 'password.update', 'uses' => 'Auth\ResetPasswordController@reset']);
Route::get('password/reset/{token?}', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/member', 'HomeController@member')->name('member');
Route::get('/report', 'HomeController@report')->name('report');
Route::get('/appointment', 'HomeController@appointment')->name('appointment');

Route::resource('cars', 'CarController');

// Route::prefix('admin')->group(function() {
Route::group(['prefix' => 'admin'], function() {
    Route::get('/index', 'AdminController@showMenuItems')->name('admin.index');
    Route::get('/edit/menu', 'AdminController@editMenuInfo')->name('admin.editmenu');
    Route::get('/edit/carinfo', 'AdminController@editCarInfo')->name('admin.editcarinfo');
    Route::get('/edit/payment', 'AdminController@editPaymentType')->name('admin.editpayment');
    Route::get('/edit/unclaimed', 'AdminController@editUnclaimed')->name('admin.editunclaimed');
    Route::get('/edit/members', 'AdminController@editMembers')->name('admin.editmembers');
    Route::get('/edit/unclaimed/free', 'AdminController@editFreeUnclaimed')->name('admin.editfreeunclaimed');
    Route::get('/transaction/search', 'AdminController@searchTransaction')->name('admin.searchtransaction');
    // Route::get('/administration', 'HomeController@administration')->name('administration');
    // Route::get('/menuitems', 'AdminController@showMenuItems')->name('menuitems');
});
