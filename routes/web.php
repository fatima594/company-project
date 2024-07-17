<?php


use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view(view: 'home');
});


Route::get('/about', function () {
    return view('layouts.about');
});
Route::get('/product', function () {
    return view('layouts.product');
});


Route::get('/contact', function () {
    return view('layouts.contact');
});

Route::get('/blog', function () {
    return view('layouts.blog');
});

Route::get('/readabout', function () {
    return view('layouts.readabout');
});
Route::post('/subscribes', [SubscribeController::class, 'store'])->name('subscribes');


//Route::resource('posts', CategoriesController::class);

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
//
//
//Route::get('/contact', function () {
//    return view('layouts.contact');
//});
//



Route::resource('products', ProductsController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(callback: function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/auth', [RegisteredUserController::class, 'destroy'])->name('auth.create');

});
Route::get('/post', function () {
    return view('post');
});

require __DIR__.'/auth.php';
