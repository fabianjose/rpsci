<?php

use Illuminate\Http\Request;

Route::post('/login','Auth\LoginController@enter');

Route::get('/departments','DepartmentController@getAll');
Route::get('/municipalities','MunicipalityController@getAll');
Route::get('/municipalities/{departmentId}','MunicipalityController@getByDepartment');

Route::post('/company','CompanyController@newCompany');
Route::get('/company','CompanyController@getAll');
Route::get('/company/{id}','CompanyController@getCompany');
Route::delete('/company/{id}','CompanyController@deleteCompany');

Route::group(['middleware' => ['JwtMiddleware']], function () {

	// Route::get('/departments','DepartmentController@getAll');
	// Route::get('/municipalities','MunicipalityController@getAll');
	// Route::get('/municipalities/{departmentId}','MunicipalityController@getByDepartment');

	// Route::post('/company','CompanyController@newCompany');
	// Route::get('/company','CompanyController@getAll');
	// Route::get('/company/{id}','CompanyController@getCompany');
	// Route::delete('/company/{id}','CompanyController@deleteCompany');

});
