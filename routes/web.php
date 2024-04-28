<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\WebpageController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WebpageController::class, 'homepage'])->name('homepage');

Route::get('/products',[WebpageController::class, 'allProducts'])->name('products');

Route::get('about-us', [WebpageController::class, 'about_us'])->name('about.us');
Route::get('/all-products', [ProductController::class, 'allProducts'])->name('all.products');



Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', [UserController::class, 'login'])->name('admin.login');
    Route::post('/do-login', [UserController::class, 'doLogin'])->name('admin.do.login');

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/', [HomeController::class, 'showHomePage'])->name('dashboard');

        Route::get('/order/list', [HomeController::class, 'orderList'])->name('order.list');

        Route::get('/product/list', [ProductController::class, 'list'])->name('product.list');
        Route::get('/product/create/form', [ProductController::class, 'createForm'])->name('product.create.form');
        Route::post('/product/store', [ProductController::class, 'productStore'])->name('product.store');

        Route::get('/category/list', [CategoryController::class, 'list'])->name('category.list');
        Route::get('/category/form', [CategoryController::class, 'categoryForm'])->name('category.form');
        Route::post('/category/store', [CategoryController::class, 'categoryStore'])->name('category.store');
        Route::get('/category/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');

        Route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update');

        Route::get('sign-out', [UserController::class, 'signout'])->name('do.signout');
    });
});
