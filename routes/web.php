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


/*shoudl be protected area*/
Route::get('/', 'ComplianceCentreController@index');
Route::get('/login', 'UserLoginController@index');
Route::post('/login', 'UserLoginController@logIn');
Route::get('/logout', 'UserLoginController@destroy');


/*=============all these must be protected routes*/

route::get('/cc_index', 'ComplianceCentreController@index');
route::post('/cc_index', 'ComplianceCentreController@index');




route::get('/customers', 'ComplianceCentreController@getCustomers');

route::get('/vin', 'VinController@index');
route::POST('/search', 'VinController@show');
route::POST('/update', 'VinController@store');
route::POST('/background_search', 'VinController@LookForVIn');














