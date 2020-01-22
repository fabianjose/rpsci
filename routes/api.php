<?php

use Illuminate\Http\Request;

Route::post('/login','Auth\LoginController@enter');

// IDEA: ESTO DEBE SER BORRADO DESPUES, ES SOLO PARA FACILITAR EL TESTEO, atte: eduardo
Route::get('/departments','DepartmentController@getAll');
Route::get('/municipalities','MunicipalityController@getAll');
Route::get('/municipalities/{departmentId}','MunicipalityController@getByDepartment');

Route::post('/company','CompanyController@newCompany');
Route::put('/company/{id}','CompanyController@editCompany');
Route::get('/company','CompanyController@getAll');
// Route::get('/company/names','CompanyController@getNames');
Route::get('/company/{id}','CompanyController@getCompany');
Route::delete('/company/{id}','CompanyController@deleteCompany');

Route::post('/service','ServiceController@newService');
Route::put('/service/{id}','ServiceController@editService');
Route::get('/service','ServiceController@getAll');
Route::get('/service/{id}','ServiceController@getService');
Route::delete('/service/{id}','ServiceController@deleteService');
//////////////////////////////////////////////////////////////////////////

Route::group(['middleware' => ['JwtMiddleware']], function () {

  // Route::get('/departments','DepartmentController@getAll');
  // Route::get('/municipalities','MunicipalityController@getAll');
  // Route::get('/municipalities/{departmentId}','MunicipalityController@getByDepartment');
  //
  // Route::post('/company','CompanyController@newCompany');
  // Route::put('/company/{id}','CompanyController@editCompany');
  // Route::get('/company','CompanyController@getAll');
  // Route::get('/company/names','CompanyController@getNames');
  // Route::get('/company/{id}','CompanyController@getCompany');
  // Route::delete('/company/{id}','CompanyController@deleteCompany');
  //
  // Route::post('/service','ServiceController@newService');
  // Route::put('/service/{id}','ServiceController@editService');
  // Route::get('/service','ServiceController@getAll');
  // Route::get('/service/{id}','ServiceController@getService');
  // Route::delete('/service/{id}','ServiceController@deleteService');

});
