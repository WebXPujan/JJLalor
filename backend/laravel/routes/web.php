<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('admin.')->group(function () {
    // Categories Routes
    Route::get('/categories',[App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/add',[App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('categories.add');
    Route::post('/categories/store',[App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/update/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('categories.update');
    Route::get('/categories/delete/{id}',[App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('categories.destroy');

    //Covers Routes
    Route::get('/covers',[App\Http\Controllers\Admin\CoverController::class, 'index'])->name('covers');
    Route::get('/covers/add',[App\Http\Controllers\Admin\CoverController::class, 'create'])->name('covers.add');
    Route::post('/covers/store',[App\Http\Controllers\Admin\CoverController::class, 'store'])->name('covers.store');
    Route::get('/covers/edit/{id}',[App\Http\Controllers\Admin\CoverController::class, 'edit'])->name('covers.edit');
    Route::post('/covers/update/{id}',[App\Http\Controllers\Admin\CoverController::class, 'update'])->name('covers.update');
    Route::get('/covers/delete/{id}',[App\Http\Controllers\Admin\CoverController::class, 'destroy'])->name('covers.destroy');

    //Fonts Routes
    Route::get('/fonts',[App\Http\Controllers\Admin\FontController::class, 'index'])->name('fonts');
    Route::get('/fonts/add',[App\Http\Controllers\Admin\FontController::class, 'create'])->name('fonts.add');
    Route::post('/fonts/store',[App\Http\Controllers\Admin\FontController::class, 'store'])->name('fonts.store');
    Route::get('/fonts/edit/{id}',[App\Http\Controllers\Admin\FontController::class, 'edit'])->name('fonts.edit');
    Route::post('/fonts/update/{id}',[App\Http\Controllers\Admin\FontController::class, 'update'])->name('fonts.update');
    Route::get('/fonts/delete/{id}',[App\Http\Controllers\Admin\FontController::class, 'destroy'])->name('fonts.destroy');

    //Orders Routes
    Route::get('/orders',[App\Http\Controllers\Admin\OrderController::class, 'index'])->name('orders');
    Route::get('/orders/add',[App\Http\Controllers\Admin\OrderController::class, 'create'])->name('orders.add');
    Route::post('/orders/store',[App\Http\Controllers\Admin\OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/edit/{id}',[App\Http\Controllers\Admin\OrderController::class, 'edit'])->name('orders.edit');
    Route::post('/orders/update/{id}',[App\Http\Controllers\Admin\OrderController::class, 'update'])->name('orders.update');
    Route::get('/orders/delete/{id}',[App\Http\Controllers\Admin\OrderController::class, 'destroy'])->name('orders.destroy');

    //Prices Routes
    Route::get('/prices',[App\Http\Controllers\Admin\PriceController::class, 'index'])->name('prices');
    Route::get('/prices/add',[App\Http\Controllers\Admin\PriceController::class, 'create'])->name('prices.add');
    Route::post('/prices/store',[App\Http\Controllers\Admin\PriceController::class, 'store'])->name('prices.store');
    Route::get('/prices/edit/{id}',[App\Http\Controllers\Admin\PriceController::class, 'edit'])->name('prices.edit');
    Route::post('/prices/update/{id}',[App\Http\Controllers\Admin\PriceController::class, 'update'])->name('prices.update');
    Route::get('/prices/delete/{id}',[App\Http\Controllers\Admin\PriceController::class, 'destroy'])->name('prices.destroy');

    //Sub Categories Routes
    Route::get('/sub_categories',[App\Http\Controllers\Admin\Sub_CategoryController::class, 'index'])->name('sub_categories');
    Route::get('/sub_categories/add',[App\Http\Controllers\Admin\Sub_CategoryController::class, 'create'])->name('sub_categories.add');
    Route::post('/sub_categories/store',[App\Http\Controllers\Admin\Sub_CategoryController::class, 'store'])->name('sub_categories.store');
    Route::get('/sub_categories/edit/{id}',[App\Http\Controllers\Admin\Sub_CategoryController::class, 'edit'])->name('sub_categories.edit');
    Route::post('/sub_categories/update/{id}',[App\Http\Controllers\Admin\Sub_CategoryController::class, 'update'])->name('sub_categories.update');
    Route::get('/sub_categories/delete/{id}',[App\Http\Controllers\Admin\Sub_CategoryController::class, 'destroy'])->name('sub_categories.destroy');
    
    //Steps Routes
    Route::get('/steps',[App\Http\Controllers\Admin\StepController::class, 'index'])->name('steps');
    
});
