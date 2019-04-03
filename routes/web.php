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

Route::get('/jsontest', function () {
    $models = [
        1 => [
            'Coo',
            'Daz',
            'Mui',
        ],
        2 => [
            'Qua',
            'Ink',
            'Scoop',
        ]
    ];

    dd($models[1]);

    $brands = [
        [
            "id" => 1,
            "brand" => "Honda"
        ],
        [
            "id" => 2,
            "brand" => "Toyota"
        ],
        [
            "id" => 3,
            "brand" => "Nissan"
        ],
        [
            "id" => 4,
            "brand" => "Proton"
        ]
    ];

    $contents = Storage::get('public/brands.json');
    $contents = json_decode($contents);
    // dd($contents);
    return view('jsontest',compact('contents'));
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

Route::get('/users/create/{role_id}', 'UserController@create')->name('users.create');
Route::resource('users', 'UserController');

Route::get('/cars/delete/{car}', 'CarController@delete')->name('cars.delete');
Route::resource('cars', 'CarController');

Route::get('/payments/delete/{payment}', 'PaymentController@delete')->name('payments.delete');
Route::resource('payments', 'PaymentController');

Route::get('/branches/delete/{branch}', 'BranchController@delete')->name('branches.delete');
Route::resource('branches', 'BranchController');

Route::group(['prefix' => 'admin', 'middleware' => 'App\Http\Middleware\AdminMiddleware'], function() {
    Route::get('/index', 'AdminController@showMenuItems')->name('admin.index');

    Route::get('/edit/menu', 'AdminController@editMenuInfo')->name('admin.editmenu');
    Route::post('/update/menu', 'AdminController@updateMenuInfo')->name('admin.updatemenu');

    Route::get('/edit/carinfo', 'AdminController@editCarInfo')->name('admin.editcarinfo');

    Route::get('/edit/payment', 'AdminController@editPaymentType')->name('admin.editpayment');
    Route::get('/add/payment', 'AdminController@addPaymentType')->name('admin.addpayment');
    Route::post('/store/payment', 'AdminController@storePaymentType')->name('admin.storepayment');

    Route::get('/edit/unclaimed', 'AdminController@editUnclaimed')->name('admin.editunclaimed');
    Route::get('/edit/unclaimed/free', 'AdminController@editFreeUnclaimed')->name('admin.editfreeunclaimed');

    Route::get('/edit/members', 'AdminController@editMembers')->name('admin.editmembers');
    Route::get('/edit/branches', 'AdminController@editBranches')->name('admin.editbranches');

    Route::get('/transaction/search', 'AdminController@searchTransaction')->name('admin.searchtransaction');
});
