<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',"GuestController@home");
Route::get('/karyawan/login',"GuestController@login");
Route::post('/login',"GuestController@do_login");
Route::get('/logout',"GuestController@logout");
Route::post('/api/smsreceive1','GuestController@smsReceive1');
Route::post('/api/smsreceive','GuestAPIController@smsReceive');
Route::post('/report',"GuestController@reportSeller");
Route::get('/reportView',function(){
	return view('guest_view/pReport');
});


Route::group(["as" => "guest"],function(){
	Route::get('/market/detail/{id}','GuestController@detail_market');
	Route::get('/fish','GuestController@list_fish');
	Route::get('/market','GuestController@list_market');


});

Route::group(["as" => "guestapi","prefix" => "api"],function(){
	Route::get("/fish/","GuestAPIController@list_fish");
	Route::get("/fish/detail/id/{id}","GuestAPIController@detail_fish_by_id");
	Route::get("/fish/detail/name/{name}","GuestAPIController@detail_fish_by_name");

	Route::get("/market","GuestAPIController@list_market");
	Route::get("/market/detail/{id}","GuestAPIController@detail_market");

});

Route::group(["as" => "fisherman","prefix" => "api/fisherman"],function(){
	Route::post("/login/","FishermanAPIController@login");
	Route::get("/caught/{fisherman_id}","FishermanAPIController@list_caught");
	Route::post("/caught/add/","FishermanAPIController@add_caught");
	Route::get("/caught/detail/{id}","FishermanAPIController@detail_caught");
	Route::post("/add/","FishermanAPIController@register");

});

Route::group(["middleware" => "admin","prefix" => "admin"],function(){
	Route::get("/","AdminController@statistik");

	Route::get("/employee","AdminController@list_employee_admin");
	Route::get("/fisherman","AdminController@list_employee_fisherman");
	Route::get("/fisherman/catch/{id}","AdminController@catch_fisherman");
	Route::match(["get","post"],"/employee/add","AdminController@add_employee");
	Route::match(["get","post"],"/employee/edit/{id}","AdminController@edit_employee");
	Route::get("/employee/delete/{id}","AdminController@edit_employee");

	Route::get("/fish","AdminController@list_fish");
	Route::match(["get","post"],"/fish/add","AdminController@add_fish");
	Route::match(["get","post"],"/fish/edit/{id}","AdminController@edit_fish");
	Route::get("/fish/delete/{id}","AdminController@delete_fish");

	Route::get("/market","AdminController@list_market");
	Route::match(["get","post"],"/market/add","AdminController@add_market");
	Route::match(["get","post"],"/market/edit/{id}","AdminController@edit_market");
	Route::get("/market/delete/{id}","AdminController@delete_market");

	Route::get("/market/detail/{id}","AdminController@detail_market");
	Route::post("/market/detail/{id}/add","AdminController@add_detail_market");
	Route::get("/market/detail/{id}/delete/{id_detail}","AdminController@delete_detail_market");	

	Route::get("/route","AdminController@route");
});