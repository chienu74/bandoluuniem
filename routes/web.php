<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Routing\RouteUri;
use App\Models\Menu;
use App\Models\Product;

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
Route::resource("/Dashboard/Menu",MenuController::class);
Route::resource("/Dashboard/Product", ProductController::class);
