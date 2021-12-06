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
    return view('login');
});




Route::get('/index', function () {
    return view('login');
})->middleware('Checklogin');

Route::post('/login_process', 					'LoginController@login_process');
Route::get('/logout_process', 					'LoginController@logout_process');

Route::get('/testkoneksi', 						'TestController@TestDatabaseConnection');
Route::get('/getdata', 							'TestController@getdata');

Route::get('/home', 							'TestController@home_page');
Route::get('/home2', 							'TestController@home2_page');
Route::get('/home3', 							'TestController@home3_page');
Route::get('/astinet', 							'TestController@astinet_page');
Route::get('/astinetbb', 						'TestController@astinetbb_page');
Route::get('/astinetlite', 						'TestController@astinetlite_page');
Route::post('/calculate_astinet', 				'TestController@calculate_astinet');
Route::post('/calculate_astinet_bb', 			'TestController@calculate_astinet_bb');
Route::post('/calculate_astinet_lite', 			'TestController@calculate_astinet_lite');

Route::get('/ubah_password', 					'LoginController@ubah_password_page');
Route::post('/ubah_password', 					'LoginController@ubah_password');

Route::get('/admin', 					        'AdminController@admin_page');
Route::get('/audittrail', 					    'AdminController@audittrail_page');
Route::get('/get_audittrail_data', 				'AdminController@get_audittrail_data');

Route::get('/daftar_pengguna', 					'AdminController@user_page');
Route::get('/get_user_data', 					'AdminController@get_user_data');


Route::get('/daftar_lokasi', 					'AdminController@location_page');
Route::get('/get_lokasi_data', 					'AdminController@get_lokasi_data');


Route::get('/harga_astinet', 					'AdminController@costastinet_page');
Route::get('/get_costastinet_data', 			'AdminController@get_costastinet_data');

Route::get('/harga_astinetlite', 				'AdminController@costastinetlite_page');


Route::get('/harga_astinetbb', 					'AdminController@costastinetbb_page');

// baru
Route::get('/IPtransit', 								'TestController@IPtransit_page');
Route::get('/IPtransitbb', 							'TestController@IPtransitbb_page');
Route::get('/IPtransitlite', 							'TestController@IPtransitlite_page');
Route::post('/calculate_IPtransit', 					'TestController@calculate_IPtransit');
Route::post('/calculate_IPtransit_bb', 				'TestController@calculate_IPtransit_bb');
Route::post('/calculate_IPtransit_lite', 				'TestController@calculate_IPtransit_lite');

Route::post('/add_user_data', 						'AdminController@add_user_data');
Route::get('/get_user_detail/{userID}', 			'AdminController@get_user_detail');
Route::post('/update_user', 		            	'AdminController@update_user');
Route::get('/delete_user/{userID}', 		    'AdminController@delete_user');
Route::post('/add_location_data', 					'AdminController@add_location_data');

Route::get('/harga_IPtransit', 						'AdminController@costIPtransit_page');
Route::get('/get_costIPtransit_data', 				'AdminController@get_costIPtransit_data');
Route::post('/add_costIPtransit_data', 				'AdminController@add_costIPtransit_data');
Route::get('/get_IPtransit_detail/{IPtransitID}', 		'AdminController@get_IPtransit_detail');
Route::post('/update_IPtransit', 		            	'AdminController@update_IPtransit');
Route::get('/delete_IPtransit/{IPtransitID}', 		    'AdminController@delete_IPtransit');


Route::get('/harga_IPtransitlite', 						'AdminController@costIPtransitlite_page');
Route::get('/get_costIPtransitlite_data', 				'AdminController@get_costIPtransitlite_data');
Route::post('/add_costIPtransitlite_data', 				'AdminController@add_costIPtransitlite_data');
Route::get('/get_IPtransitLite_detail/{IPtransitLiteID}', 	'AdminController@get_IPtransitLite_detail');
Route::post('/update_IPtransitLite', 		            	'AdminController@update_IPtransitLite');

Route::get('/harga_IPtransitbb', 						'AdminController@costIPtransitbb_page');
Route::get('/get_costIPtransitbb_data', 				'AdminController@get_costIPtransitbb_data');
Route::post('/add_costIPtransitbb_data', 				'AdminController@add_costIPtransitbb_data');
Route::get('/get_IPtransitbb_detail/{IPtransitbbID}', 	'AdminController@get_IPtransitbb_detail');
Route::post('/update_IPtransitbb', 		        	'AdminController@update_IPtransitbb');

// end baru



// Route::get('/astinet', function () {
//     return view('astinet');
// });