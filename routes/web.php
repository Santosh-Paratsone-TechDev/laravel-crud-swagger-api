<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. The root route below serves a
| learning page documenting the API and linking to the Swagger UI.
|
*/

Route::get('/', function () {
    return view('learn');
});
