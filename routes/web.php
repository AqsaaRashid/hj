<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\WebsiteController;
use App\Http\Controllers\Admin\MenuItemController;

Route::get('/', function () {
    return view('index');
});

Route::get('about', function () {
    return view('about');
});
Route::get('menu', function () {
    return view('menu');
});
Route::get('privacy', function () {
    return view('privacy');
});
Route::get('contact', function () {
    return view('contact');
});
Route::get('faqs', function () {
    return view('faqs');
});


// routes



Route::get('/', [WebsiteController::class,'index'])->name('home');
Route::get('/menu', [WebsiteController::class,'menu'])->name('menu');
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

  

    // Categories CRUD
    Route::resource('categories', CategoryController::class);

    // Menu Items CRUD
    Route::resource('menu-items', MenuItemController::class);

});
Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('categories', CategoryController::class);
    Route::resource('menu-items', MenuItemController::class);
});
Route::resource('admin/offers', \App\Http\Controllers\Admin\OfferController::class)
    ->names('admin.offers');
    Route::get('/get-products', [WebsiteController::class, 'getProducts']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
