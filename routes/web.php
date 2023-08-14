<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

// category Routes

Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
    Route::get('/category', 'index');
    Route::get('/category/create', 'create');
    Route::post('/category', 'store');
    Route::get('/category/edit/{id}', 'edit');
    Route::put('/category/{category}','update');
});

// product controller
Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
    Route::get('/products', 'index');
    Route::get('/products/create', 'create');
    Route::post('/products','store');
    Route::get('/products/{product}/edit', 'edit');
    Route::post('/products/update','update')->name('/products/update'); 
    Route::get('product-image/{product_image_id}/delete','destroyImage');
    Route::get('products/{product_id}/delete','destroy');

});
 Route::get('/brands', App\Http\Livewire\Admin\Brand\Index:: class);

    // color controller
    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors/create', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::POST('/colors/update','update')->name('/colors/update'); 
        Route::get('/colors/{color_id}/delete','destroy');
    });

    // slider controller
    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('sliders','index');
        Route::get('sliders/create','create')->name('sliders.create');
        Route::post('/sliders/create', 'store')->name('sliders.store');
        Route::get('/sliders/{slider}/edit', 'edit');
        Route::put('/sliders/{slider}','update');
        Route::get('/sliders/{slider}/delete','destroy');
    });

});