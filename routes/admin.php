<?php

Route::prefix('/admin')->group(function(){
	Route::get('/', 'Admin\DashboardController@getDashboard')->name('dashboard');


	//Module Users
	Route::get('/users/{status}','Admin\UsersController@getUsers')->name('user_list');
	Route::get('/user/{id}/edit','Admin\UsersController@getUserEdit')->name('user_edit');
	Route::post('/user/{id}/edit','Admin\UsersController@postUserEdit')->name('user_edit');
	Route::get('/user/{id}/banned','Admin\UsersController@getUserBanned')->name('user_banned');
	Route::get('/user/{id}/permissions','Admin\UsersController@getUserPermissions')->name('user_permissions');
	Route::post('/user/{id}/permissions','Admin\UsersController@postUserPermissions')->name('user_permissions');


});
