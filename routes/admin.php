<?php

Route::prefix('/admin')->group(function(){
	Route::get('/', 'Admin\DashboardController@getDashboard')->name('dashboard');

	//Modulo Usuarios
	Route::get('/users/{status}','Admin\UsersController@getUsers')->name('user_list');
	Route::get('/user/add', 'Admin\UsersController@getUserAdd')->name('user_add');
	Route::post('/user/add', 'Admin\UsersController@postUserAdd')->name('user_add');
	Route::get('/user/{id}/edit','Admin\UsersController@getUserEdit')->name('user_edit');
	Route::post('/user/{id}/edit','Admin\UsersController@postUserEdit')->name('user_edit');
	Route::get('/user/{id}/permissions','Admin\UsersController@getUserPermissions')->name('user_permissions');
	Route::post('/user/{id}/permissions','Admin\UsersController@postUserPermissions')->name('user_permissions');

	Route::get('/account/edit', 'Admin\UsersController@getAccountEdit')->name('account_edit');
	Route::post('/account/edit/avatar', 'Admin\UsersController@postAccountAvatar')->name('account_edit');
	Route::post('/account/edit/password', 'Admin\UsersController@postAccountPassword')->name('account_edit');
	Route::post('/account/edit/info', 'Admin\UsersController@postAccountInfo')->name('account_edit');

	// Route::post('/user/search', 'Admin\UsersController@postUserSearch')->name('user_search');




});
