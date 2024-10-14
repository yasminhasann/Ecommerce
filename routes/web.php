<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\website\CartController;
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\website\LangController;
use App\Http\Controllers\website\ShopController;
use App\Http\Controllers\website\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\website\ThanksController;
use App\Http\Controllers\website\ContactController;
use App\Http\Controllers\website\CheckoutController;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\website\WishlistController;

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

//lang route
Route::get('/lang/set/{lang}', [LangController::class, 'set']);

Route::middleware('lang')->group(function () {

    //website routes
        Route::view('about', 'website.about');
        Route::view('checkout','website.checkout');
        Route::view('/shop-single', 'website.shop-single');
        Route::view('/shop','website.shop');
        Route::view('/cart','website.cart');
        Route::view('','website.index');
        Route::view('/thankyou', 'website.thankyou');
        Route::view('/contact', 'website.contact');
        // wishlist Route
        Route::middleware('auth')->group(function () {
            Route::get('/wishlist', [WishlistController::class, 'showWishlist'])->name('wishlist.index');
            Route::post('/wishlist/add/{product}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
            Route::delete('/wishlist/remove/{product}', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
        });
        //Contact-Mail route
        Route::post('/contact', [ContactController::class, 'contactFormSubmit'])->name('contact.submit');

    //authentications routes
        //register routes
            Route::view('/register', "auth.register")->middleware(["guest"]);
            Route::post('/register', [AuthController::class, 'register'])->middleware(["guest"]);

        //login routes
            Route::view('/login',"auth.login")->middleware(["guest"])->name('login');
            Route::post('/login', [AuthController::class, 'login'])->middleware(["guest"]);

        //logout route
            Route::get('/logout', [AuthController::class, 'logout'])->middleware(["auth"]);


            //admin routes
            Route::middleware('admin')->group(function () {
                Route::prefix('admin')->group(function () {
                    Route::view('','admin.index')->name('admin');
                    Route::resource('categories', CategoryController::class);
                    Route::get('/categories-trashed', [CategoryController::class, 'trashed'])->name('categories.trashed');
                    Route::post('/categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
                    Route::delete('/categories/{id}/force-delete', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');

                    Route::middleware('superAdmin')->group(function () {
                        //user routes
                        Route::resource('users', UserController::class);
                        Route::get('/users-trashed', [UserController::class, 'trashed'])->name('users.trashed');
                        Route::post('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
                        Route::delete('/users/{id}/force-delete', [UserController::class, 'forceDelete'])->name('users.forceDelete');
                });
            });
        });

});


