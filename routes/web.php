<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth::routes();

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login','Auth\LoginController@enter');
Route::get('logout', 'Auth\LoginController@logout');
Route::group(["middleware" => ["isAuth"]], function(){


    Route::get('/', 'HomeController@index');

    Route::get("/companies", function(){
        return view('pages.companies');
    });

    Route::get("/offers", function(){
        return view('pages.offers');
    });

    Route::get("/banners", function(){
        return view('pages.banners');
    });

    Route::get('/services', function () {
        return view('pages.services');
    });

    Route::get("/plans", function(){
        return view('pages.plans');
    });


});


/*
return view('home');
})->name('home')->middleware('auth');
Route::get('/home', function() {
*/

Route::get('avatar/{filename}', function ($filename){

    $path = storage_path('app/uploads/logos/' . $filename);

    if (!File::exists($path)) { abort(404); }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
