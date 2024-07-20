<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;
use App\Models\products;
use  App\Models\blogs;

Route::get('/', function () {
    return view(view: 'home');
});


Route::get('/about', function () {
    return view('layouts.about');
});
Route::get('/product', function () {
    $products = products::all();
    return view('layouts.product', ['products' => $products]);
});

Route::get('/blog', function () {
    $blogs = blogs::all();
    return view('layouts.blog', ['blogs' => $blogs]);
});


Route::get('/contact', function () {
    return view('layouts.contact');
});

Route::get('/readabout', function () {
    return view('layouts.readabout');
});
Route::post('/subscribes', [SubscribeController::class, 'store'])->name('subscribes');


//Route::resource('posts', CategoriesController::class);

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::resource('products', ProductsController::class);
Route::resource('blogs', BlogController::class);
//

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
