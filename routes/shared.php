<?php

Auth::routes();

Route::resource('/sales', 'SaleController');

Route::get('/operations', 'OperationsController@getOperations')->name('operations');

Route::get('/ops-billing', 'BillingsController@getBilling')->name('ops-billing');

Route::get('/crm', 'CrmsController@getCrm')->name('crm');

Route::resource('/users', 'UserController');

Route::resource('/states', 'StateController');

Route::resource('/cities', 'CityController');

Route::resource('/salutations', 'SalutationController');

Route::resource('/sources', 'SourceController');

Route::resource('/departments', 'DepartmentController');

Route::resource('/services', 'ServiceController');

Route::resource('/reasons', 'ReasonController');

Route::resource('/types', 'TypeController');

Route::resource('/verticals', 'VerticalController');

Route::resource('/notifications', 'NotificationController');
