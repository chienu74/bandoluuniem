<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'Page\HomeController@index');
Route::get('Dashboard', 'Admin\HomeController@index');
Route::prefix('Dashboard')->group(function () {
    Route::prefix('Menu')->group(function () {
        Route::get('/', 'Admin\MenuController@index');
        Route::get('index', 'Admin\MenuController@index');
        Route::get('create', 'Admin\MenuController@create');
    });
});
