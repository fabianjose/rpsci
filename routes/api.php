<?php

use Illuminate\Http\Request;

Route::post('/login','Auth\LoginController@enter');

// IDEA: ESTO DEBE SER BORRADO DESPUES, ES SOLO PARA FACILITAR EL TESTEO, atte: eduardo
Route::get('/departments','DepartmentController@getAll');
Route::get('/municipalities','MunicipalityController@getAll');
Route::get('/municipalities/{departmentId}','MunicipalityController@getByDepartment');

Route::post('/company','CompanyController@newCompany');
Route::put('/company/{id}','CompanyController@editCompany');
Route::put('/company/{name}/highlight','CompanyController@highlightCompany');
Route::put('/company/{id}/dehighlight','CompanyController@deHighlightCompany');
Route::get('/companies','CompanyController@getAll');
Route::get('/companies/highlighted','CompanyController@getAllHighlighted');
// Route::get('/company/names','CompanyController@getNames');
Route::get('/company/{id}','CompanyController@getCompany');
Route::delete('/company/{id}','CompanyController@deleteCompany');

Route::post('/service','ServiceController@newService');
Route::put('/service/{id}','ServiceController@editService');
Route::get('/services','ServiceController@getAll');
Route::get('/service/{id}','ServiceController@getService');
Route::delete('/service/{id}','ServiceController@deleteService');

Route::post('/offer','OfferController@newOffer');
Route::put('/offer/{id}','OfferController@editOffer');
Route::get('/offers','OfferController@getAll');
Route::get('/offer/{id}','OfferController@getOffer');
Route::delete('/offer/{id}','OfferController@deleteOffer');

Route::post('offers/area', 'OfferController@getByLocation');
Route::get('offers/highlighted', 'OfferController@getAllHighlighted');
Route::post('offers/highlight/{id}', "OfferController@HighlightOffer");
Route::post('offers/area/highlight', "OfferController@getHighlightByLocation");
//////////////////////////////////////////////////////////////////////////

Route::group(['middleware' => ['JwtMiddleware']], function () {

  // Route::get('/departments','DepartmentController@getAll');
  // Route::get('/municipalities','MunicipalityController@getAll');
  // Route::get('/municipalities/{departmentId}','MunicipalityController@getByDepartment');
  //
  // Route::post('/company','CompanyController@newCompany');
  // Route::put('/company/{id}','CompanyController@editCompany');
  // Route::put('/company/{id}/highlight','CompanyController@highlightCompany');
  // Route::put('/company/{id}/dehighlight','CompanyController@deHighlightCompany');
  // Route::get('/companies','CompanyController@getAll');
  // Route::get('/companies/highlighted','CompanyController@getAllHighlighted');
  // // Route::get('/company/names','CompanyController@getNames');
  // Route::get('/company/{id}','CompanyController@getCompany');
  // Route::delete('/company/{id}','CompanyController@deleteCompany');
  //
  // Route::post('/service','ServiceController@newService');
  // Route::put('/service/{id}','ServiceController@editService');
  // Route::get('/services','ServiceController@getAll');
  // Route::get('/service/{id}','ServiceController@getService');
  // Route::delete('/service/{id}','ServiceController@deleteService');
  //
  // Route::post('/offer','OfferController@newOffer');
  // Route::put('/offer/{id}','OfferController@editOffer');
  // Route::get('/offers','OfferController@getAll');
  // Route::get('/offer/{id}','OfferController@getOffer');
  // Route::delete('/offer/{id}','OfferController@deleteOffer');

});
