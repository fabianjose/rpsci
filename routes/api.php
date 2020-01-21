<?php

use Illuminate\Http\Request;

Route::post('/login','Auth\LoginController@enter');

Route::group(['middleware' => ['JwtMiddleware']], function () {

});
