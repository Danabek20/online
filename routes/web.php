<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MineController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;



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

// Route::get('/', function () {
//     return view('home.index');
// });

Route::get('/',[MineController::class,'productIndex']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/dash',[MineController::class,'dashboard']);


//
Route::get('viewAllOrders',[MineController::class,'viewAllOrders'])->name('viewAllOrders');

//Category
Route::get('categoryIndex',[CategoryController::class,'categoryIndex'])->name('categoryIndex');

Route::get('categoryAdd',[CategoryController::class,'categoryAdd'])->name('categoryAdd');

Route::get('categoryEdit/{id}',[CategoryController::class,'categoryEdit'])->name('categoryEdit');

Route::post('categoryDelete/{id}',[CategoryController::class,'categoryDelete'])->name('categoryDelete');

Route::post('categoryStore',[CategoryController::class,'categoryStore'])->name('categoryStore');

Route::post('categoryUpdate',[CategoryController::class,'categoryUpdate'])->name('categoryUpdate');

//Product
Route::get('productIndex',[ProductController::class,'productIndex'])->name('productIndex');

Route::get('productAdd',[ProductController::class,'productAdd'])->name('productAdd');

Route::post('productStore',[ProductController::class,'productStore'])->name('productStore');

Route::get('productEdit/{id}',[ProductController::class,'productEdit'])->name('productEdit');

Route::post('productUpdate',[ProductController::class,'productUpdate'])->name('productUpdate');

Route::get('productSearch',[ProductController::class,'productSearch'])->name('productSearch');

Route::post('productDelete/{id}',[ProductController::class,'productDelete'])->name('productDelete');

// home main

Route::get('/',[MineController::class,'indexHomeProduct']);

Route::get('cart-view-product',[MineController::class,'cartViewProduct'])->name('cartViewProduct');

Route::get('descproduct/{id}',[MineController::class,'descProduct'])->name('descProduct');

Route::post('addToCart/{id}',[MineController::class,'addToCart'])->name('addToCart');

Route::post('addToOrder',[MineController::class,'addToOrder'])->name('addToOrder');

Route::get('orderSearch',[MineController::class,'orderSearch'])->name('orderSearch');

Route::get('updateStatus/{id}',[MineController::class,'updateStatus'])->name('updateStatus');
