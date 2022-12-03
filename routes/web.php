<?php

use Illuminate\Support\Facades\Route;
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
Route::any('/', function () {
    return view('main.home');
});
Route::any('/home', function () {
    return view('main.home');
});

/////////////////////////////////////////////////////////////////////
//////////////////staff//////////////////////////////////////////////
Route::any('/staff_{id}_view_information', 'App\Http\Controllers\staffs@view_info'); //yes staff
Route::any('/staff/update_account_info', function () { ///yes staff
    return view('/staff/update_info');
});
Route::any('/staff/do_contract', 'App\Http\Controllers\staffs@do_contract'); ///yes_staff;
Route::any('/staff/update_accounts', 'App\Http\Controllers\staffs@update'); ////yes staff
route::any('/staff/change_owners', 'App\Http\Controllers\staffs@change_owner_page');
route::any('/home_page', 'App\Http\Controllers\staffs@home_page');

////yes staff
/////////////////////////////////////////////////////////////////////////////////////////
//=====================================================================================//
Route::any('/staff/change_owner', function () {
    return view('/staff/change_owner');
});

Route::any('/staff/change/owner', 'App\Http\Controllers\staffs@change_owners');
Route::any('/customer/view_{id}_profile', 'App\Http\Controllers\customers@view_profile'); //////yes customer////////
Route::any('/customer/view_my_{id}_contract', 'App\Http\Controllers\customers@view_my_contract'); ////yes____customer//////
Route::any('/customer/view_info', 'App\Http\Controllers\customers@view_info');
Route::any('/customer/contact', function () {
    return view('/customer/contact');
});
Route::any('/staff_register', function () {
    return view('/admin/staff_register');
});
Route::any('/register/new-customer', 'App\Http\Controllers\register@new_register');
Route::any('/staffs_register', 'App\Http\Controllers\register@staff_register');
Route::any('/customer_register_{id}', 'App\Http\Controllers\register@customer_register');
Route::any('/customer/register_{id}', 'App\Http\Controllers\register@customeregister');

Route::any('/customer_registers', function () {
    return view('/admin.customer_register');
});

Route::any('/post', 'App\Http\Controllers\view_complain@new_post');
Route::any('/view_complain', 'App\Http\Controllers\view_complain@view_complain');
Route::any('/view_report', 'App\Http\Controllers\generate_report@view_report');
Route::any('/generate_report', 'App\Http\Controllers\view_accident@show_accident');
Route::any('/customer_view_contract', 'App\Http\Controllers\view_contracts@view_contracts');
Route::any('/post_notice', function () {
    return view('/admin/post_notice');
});
Route::any('/about', function () {
    return view('/main/login');
});
Route::any('/sign_in', 'App\Http\Controllers\login@logins');

Route::any('/sign-up', function () {
    return view('/main/login');
});
Route::any('/create-new-account', function () {
    return view('/main/register');
});

// customer  ///////////////////////////////////////////////
// Route::any('/customer/accident_{id}_report', function ($id) {
//     return view('customer.accident_report');
// });
Route::any('/logout', 'App\Http\Controllers\customers@logout');

Route::any('/customer/accident_{id}_report_page', 'App\Http\Controllers\customers@accident_report');
/////////////yes_customer////////
Route::post('/customer/registeration', 'App\Http\Controllers\register@customer_registers');
Route::get('/customer_register', function () {
    return view('customer.register');
});
Route::any('/customer/give_comment_page_{id}', 'App\Http\Controllers\give_comment@give_comment'); ////yes_customer/////
Route::any('/customer/_{id1}_{id2}_send_approve', 'App\Http\Controllers\customers@send_approve');
Route::any('/customer/logout', 'App\Http\Controllers\customers@logout');
Route::any('/_{id}_home_page', 'App\Http\Controllers\customers@home_page');

Route::any('customer/give_comments_{id}', 'App\Http\Controllers\give_comment@comment'); ///yes_customer////////
Route::any('/customer/view_{id}_notice', 'App\Http\Controllers\view_notice@view_notice');

Route::any('/customer/accident_{id}_report', 'App\Http\Controllers\generate_report@accident_report'); /////yes_customer////////////////
/////////////////////////////////////////////////////////////////////////////////staff
Route::get('/staff/register', function () {
    return view('/staff/register_customer'); ///yes__staff///////
});
Route::any('/contact', function () {
    return view('/staff/contact');
});

Route::any('/staff/add-new-customer', 'App\Http\Controllers\staffs@add_new_customer'); ///yes___///////
Route::any('/staff/{id}/send_approve', 'App\Http\Controllers\staffs@staff_approve');
Route::any('/staff/logout', 'App\Http\Controllers\staffs@logout');
Route::get('/staff/add_account', function () {
    return view('/main/login');
});
Route::any('/staff/update_account', 'App\Http\Controllers\staffs@update_account'); ////yes
/////////////////////////admin///////////////////////////////////
Route::any('/admin/approve_contract', 'App\Http\Controllers\admin@show_contract');
Route::any('/admin/{id}/send_approve', 'App\Http\Controllers\admin@admin_approve');
Route::any('/admin/sign_out', 'App\Http\Controllers\admin@sign_out');
Route::get('/admin/contact', function () {
    return view('/admin/contact');
});
route::get('/admin/view_accident', 'App\Http\Controllers\admin@show_accident');
Route::any('/admin/customer_info_approve', 'App\Http\Controllers\admin@customer_approve');
Route::any('/admin/{id}/request_approve', 'App\Http\Controllers\admin@request_approve');
Route::any('//dashboard', 'App\Http\Controllers\admin@dashboard');
Route::any('/admin/show_paids', 'App\Http\Controllers\admin@show_paids');
Route::any('/admin/reject_{id}', 'App\Http\Controllers\admin@reject_paids');
Route::any('/admin/accept_{id}', 'App\Http\Controllers\admin@success_paids');
Route::any('/give_privilege', function () {
    return view('/admin.give_privilege');
});
Route::any('/admin/status', 'App\Http\Controllers\admin@status');
Route::any('/block{id}', 'App\Http\Controllers\admin@block_user');
Route::any('/notify{id}', 'App\Http\Controllers\admin@notify_user');
Route::any('/customer/show_{id}_notification', 'App\Http\Controllers\customers@show_notification');
Route::any('/assign-privilege', 'App\Http\Controllers\admin@assign_privilege');
Route::any('/assign_{id}', 'App\Http\Controllers\admin@set_privilege');
