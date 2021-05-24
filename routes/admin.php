<?php

Route::prefix('/admin')->group(function(){

	//MÓDULO DE INICIO
	Route::get('/', 'Admin\DashboardController@getDashboard')->name('dashboard');

	//MÓDULO DE USUARIOS
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


	//MÓDULO DE EQUIPOS DE CÓMPUTO
	Route::get('/equipments/{filter}','Admin\EquipmentsController@getEquipmentHome')->name('equipment_list');
	Route::get('/equipment/{id}/info', 'Admin\EquipmentsController@getEquipmentInfo')->name('equipment_list');
	Route::get('/equipment/add', 'Admin\EquipmentsController@getEquipmentAdd')->name('equipment_add');
	Route::post('/equipment/add', 'Admin\EquipmentsController@postEquipmentAdd')->name('equipment_add');
	Route::get('/equipment/add/features', 'Admin\EquipmentsController@getEquipmentAddFeatures')->name('equipment_add');
	Route::post('/equipment/add/features', 'Admin\EquipmentsController@postEquipmentAddFeatures')->name('equipment_add');
	Route::get('/equipment/{id}/edit', 'Admin\EquipmentsController@getEquipmentEdit')->name('equipment_edit');
	Route::post('/equipment/{id}/edit', 'Admin\EquipmentsController@postEquipmentEdit')->name('equipment_edit');
	Route::get('/equipment/{id}/edit/features', 'Admin\EquipmentsController@getEquipmentEditFeatures')->name('equipment_edit');
	Route::post('/equipment/{id}/edit/features', 'Admin\EquipmentsController@postEquipmentEditFeatures')->name('equipment_edit');
	Route::get('/equipment/{id}/delete', 'Admin\EquipmentsController@getEquipmentDelete')->name('equipment_delete');
	Route::get('/equipment/{id}/restore', 'Admin\EquipmentsController@getEquipmentRestore')->name('equipment_delete');
	Route::get('/equipment/output', 'Admin\EquipmentsController@getEquipmentOutput')->name('equipment_output');
	Route::get('/equipment/output/{serie_equipo}', 'Admin\EquipmentsController@getEquipmentOutputDatos')->name('equipment_output');
	Route::post('/equipment/output', 'Admin\EquipmentsController@postEquipmentOutput')->name('equipment_output');

	//MÓDULO DE REPARACIÓN DE EQUIPOS
	Route::get('/repairs/{filter}','Admin\RepairsController@getRepairHome')->name('repair_list');


	//MÓDULO DE MANTENIMIENTOS DE EQUIPOS
	Route::get('/maintenances/{filter}','Admin\MaintenancesController@getMaintenanceHome')->name('maintenance_list');


	//MÓDULO DE REPORTES
	Route::get('/report/inventory/data', 'Admin\ReportsController@getReportInventoryData')->name('reports_home');
	Route::post('/report/inventory', 'Admin\ReportsController@postReportInventory')->name('reports_home');
	Route::get('/reports/home', 'Admin\ReportsController@getReportsHome')->name('reports_home');
	Route::get('/report/outputs/data', 'Admin\ReportsController@getReportOutputsData')->name('reports_home');
	Route::post('/report/outputs', 'Admin\ReportsController@postReportOutputs')->name('reports_home');
	Route::get('/report/outputs/movements', 'Admin\ReportsController@getReportOutputsMovements')->name('reports_home');





});
