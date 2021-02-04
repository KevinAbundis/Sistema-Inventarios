<?php

Route::prefix('/admin')->group(function(){
	Route::get('/', 'Admin\DashboardController@getDashboard')->name('dashboard');

	//Module Users
	Route::get('/users/{status}','Admin\UsersController@getUsers')->name('user_list');




});
