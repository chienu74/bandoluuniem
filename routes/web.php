<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductCategoryController;

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
Route::get('Product', 'Page\ProductController@index');
Route::get('Admin', 'Admin\HomeController@index');
Route::resource("/Admin/Menu", MenuController::class);
Route::resource("/Admin/Product", ProductController::class);
// Route::post('/Admin/Product/{ProductID}', [ProductController::class, 'update']);
Route::resource("/Admin/ProductCategory", ProductCategoryController::class);
Route::get('/x', function () {
    return view("welcome");
});
