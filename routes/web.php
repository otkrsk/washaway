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

Route::get('/users/create/{role_id}', 'UserController@create')->name('users.create');
Route::resource('users', 'UserController');

Route::get('/cars/delete/{car}', 'CarController@delete')->name('cars.delete');
Route::resource('cars', 'CarController');

Route::post('/ajax/test', 'CarmodelController@ajaxcall')->name('ajax.test');
Route::resource('carmodels', 'CarmodelController');

// Route::get('/payments/{sale}/pay', 'PaymentController@pay')->name('payments.pay');
Route::post('/payments/{sale}/pay', 'PaymentController@pay')->name('payments.pay');
Route::get('/payments/{sale}/confirm', 'PaymentController@confirm')->name('payments.confirm');
Route::get('/payments/{sale}/summary', 'PaymentController@summary')->name('payments.summary');
Route::get('/payments/delete/{payment}', 'PaymentController@delete')->name('payments.delete');
Route::resource('payments', 'PaymentController');

Route::get('/payments/types/{type}/delete', 'PaymentTypeController@delete')->name('types.delete');
Route::resource('payment/types', 'PaymentTypeController');

Route::post('/sales/open', 'SaleController@open')->name('sales.open');
Route::get('/sales/{sale}/cancel', 'SaleController@cancel')->name('sales.cancel');
Route::get('/sales/{sale}/submit', 'SaleController@submit')->name('sales.submit');
Route::get('/sales/remove/{customer}/{sale}/{item}/{flag?}', 'SaleController@remove_service')->name('sales.removeservice');
Route::get('/sales/new/{customer}/{item}/{flag?}', 'SaleController@new')->name('sales.new');
Route::get('/sales/summary', 'SaleController@summary')->name('sales.summary');
Route::get('/sales/transactions', 'SaleController@transactions')->name('sales.transactions');
Route::resource('sales', 'SaleController');

Route::get('/memberships/car/{car}/transactions', 'MembershipController@car_transactions')->name('memberships.cartransactions');
Route::get('/memberships/new', 'MembershipController@new')->name('memberships.new');
Route::get('/memberships/add/{customer}/subcar', 'MembershipController@add_subcar')->name('memberships.addsubcar');
Route::resource('memberships', 'MembershipController');

Route::get('/branches/delete/{branch}', 'BranchController@delete')->name('branches.delete');
Route::resource('branches', 'BranchController');

Route::get('/menus/create/general', 'MenuController@create_general')->name('menus.creategeneral');
Route::get('/menus/add/menuitem/{menu}', 'MenuController@add_menuitem')->name('menus.addmenuitem');
Route::resource('menus', 'MenuController');

Route::get('/delete/{item}', 'MenuItemController@delete')->name('items.delete');
Route::resource('items', 'MenuItemController');

Route::post('/services/import', 'ServiceController@import')->name('services.import');
Route::get('/services/import', 'ServiceController@importExportView')->name('services.importexportview');
Route::get('/services/list/{customer}/services/categories/{sale?}', 'ServiceController@listCategories')->name('services.listcategories');
Route::get('/services/list/{customer}/services/{product_type}/{sale?}', 'ServiceController@listServices')->name('services.listservices');
Route::get('/services/list/{customer}/memberships', 'ServiceController@listMemberships')->name('services.listmemberships');
Route::get('/services/list/promotions', 'ServiceController@listPromotions')->name('services.listpromotions');
Route::get('/services/list/unclaimed', 'ServiceController@listUnclaimed')->name('services.listunclaimed');
Route::get('/services/list/giftcredits', 'ServiceController@giftCredits')->name('services.giftcredits');
Route::resource('services', 'ServiceController');

Route::get('/customers/{customer}/addservice/list/{sale?}', 'CustomerController@addservicelist_stub')->name('customers.addservicelist');
Route::get('/customers/{customer}/addservice', 'CustomerController@addservice_stub')->name('customers.addservice');
Route::post('/customers/search', 'CustomerController@search_stub')->name('customers.search');
Route::resource('customers', 'CustomerController');

Route::post('/customers/add/subcar', 'CustomercarController@create_subcar')->name('customercars.createsubcar');
Route::resource('customercars', 'CustomercarController');

Route::get('/unclaimed/{customer}/list', 'UnclaimedController@list')->name('unclaimed.list');
Route::post('/unclaimed/{customer}/add', 'UnclaimedController@add')->name('unclaimed.add');
Route::post('/unclaimed/search', 'UnclaimedController@search')->name('unclaimed.search');
Route::post('/unclaimed/update/quantity/{customer}', 'UnclaimedController@update_quantity')->name('unclaimed.updatequantity');
Route::post('/unclaimed/add/{customer}', 'UnclaimedController@add_unclaimed')->name('unclaimed.addunclaimed');
Route::get('/unclaimed/remove/{unclaimed}/{customer}', 'UnclaimedController@remove_unclaimed')->name('unclaimed.removeunclaimed');
Route::resource('unclaimed', 'UnclaimedController');

Route::resource('promotions', 'PromotionController');

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

    Route::get('/edit/promotions', 'AdminController@editPromotions')->name('admin.editpromotions');

    Route::get('/transaction/search', 'AdminController@searchTransaction')->name('admin.searchtransaction');
});