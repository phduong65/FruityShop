<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\CartController;
use function Laravel\Prompts\search;

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

Route::get('/',[ProductController::class,'index'])->name('/');
Route::get('/search',[ProductController::class,'search'])->name('search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Trong routes/web.php

Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/add-to-cart/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/remove-from-cart/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');


// routes/web.php



// ... Các tuyến đường khác

require __DIR__.'/auth.php';
