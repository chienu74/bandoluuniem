<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Page\ContactController;

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
// Route::get('/Login', 'Page\HomeController@loginView');
// Route::get('Login', function () {
//     return view('pages.login');
// });




//page
Route::get('/Product', 'Page\ProductController@index');
Route::get('/cart', 'Page\ProductController@cart');
Route::post('/addToCart', 'Page\ProductController@add');
Route::get('/Order', 'Page\ProductController@order');

Route::get('/ProductDetail', 'Page\ProductController@detail');
Route::get('/Why-us', function () {
    return view('pages.why');
});
Route::resource('Contact', ContactController::class);

Route::get('/Signup', 'Page\HomeController@signupView');
Route::post('/Signup', 'Page\HomeController@signup');

Route::get('/Login', 'Page\HomeController@loginView');
Route::post('/Login', 'Page\HomeController@login');

Route::get('/Logout', 'Page\HomeController@logout');
//admin
// Route::group(['middleware' => 'checkLogin'], function () {
Route::middleware('checkLogin')->group(function () {
    Route::get('Admin', 'Admin\HomeController@index');
    Route::resource("/Admin/Menu", MenuController::class);
    Route::resource("/Admin/Product", ProductController::class);
    Route::resource("/Admin/ProductCategory", ProductCategoryController::class);
});

Route::get("/Admin/Signup", [HomeController::class, 'signupView']);
Route::post("/Admin/Signup", [HomeController::class, 'signup']);

Route::get("/Admin/Login", [HomeController::class, 'loginView'])->name('admin.login');
Route::post("/Admin/Login", [HomeController::class, 'login']);

Route::get("/Admin/Logout", [HomeController::class, 'logout']);

Route::get('/x', function () {
    return view("welcome");
});
