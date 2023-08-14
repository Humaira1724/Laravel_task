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

Route::get('/user', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);


route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
Route::get('home', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

// category Routes
Route::get('home', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('home');
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


Route::get('addcart/{id}', [App\Http\Controllers\Frontend\FrontendController::class, 'cart'])->name('addcart');

Route::patch('update_cart', [App\Http\Controllers\Frontend\CartController::class, 'update'])->name('update_cart');
Route::delete('remove_from_cart', [ProductController::class, 'remove'])->name('remove_from_cart');
// login
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
// register
Route::get('register', [App\Http\Controllers\UserController::class, 'user_register'])->name('user_register');




// login and register route
Auth::routes();

Route::get('/home', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('home');

// Route::get('addcart/{product_id}/delete', 'destroy',[App\Http\Controllers\Frontend\FrontendController::class, 'cart'])->name('addcart.destroy');


Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {

    Route::get('/addcart/{product_id}/delete','destroy');
});

Route::get('checkout', [App\Http\Controllers\Frontend\FrontendController::class, 'checkout'])->name('checkout');
Route::patch('update-cart', [App\Http\Controllers\Frontend\FrontendController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [App\Http\Controllers\Frontend\FrontendController::class, 'remove'])->name('remove.from.cart');