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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::resource('medicine', 'MedicineController');


Route::resource('appointment', 'AppointmentController');


Route::resource('doctor', 'DoctorController');

Route::post('/orders/details', 'OrderController@details')->name('order.details');

Route::get('/orders/waiting/{order_id}/{total}', function ($order_id,$total) {

    return view('order.waiting',['order_id'=>$order_id,'total'=>$total]);

})->name('order.pending');

Route::get('/orders/pastorders','OrderController@pastOrders')->name('order.past_orders');


Route::resource('orders', 'OrderController');

Route::resource('cart', 'CartController');

Route::get('/checkout','CartController@checkout')->name('cart.checkout');

Route::get('/cart','CartController@index')->name('cart.index');

Route::get('/agentsimulator','Agent@index')->name('agentsimulator.index');

Route::post('/agentsimulator','Agent@paid')->name('agentsimulator.paid');



Route::post('/order/waiting','OrderController@check_pay')->name('order.check_pay');








Route::get('/admin', 'AdminController@index')->name('admin.dashboard')->middleware('isAdmin');
Route::get('/admin/orders', 'AdminController@orders')->name('admin.orders')->middleware('isAdmin');
Route::get('/admin/appointments', 'AdminController@appointments')->name('admin.appointments')->middleware('isAdmin');
Route::get('/admin/medicines','AdminController@medicines')->name('admin.medicines')->middleware('isAdmin');
Route::get('/admin/doctors','AdminController@doctors')->name('admin.doctors')->middleware('isAdmin');


Route::post('/admin/appointments', 'AppointmentController@approve')->name('appointment.approve')->middleware('isAdmin');



Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile/update', 'ProfileController@update')->name('profile.update');


    