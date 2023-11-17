<?php

use App\Http\Controllers\CommentPostController;
use App\Http\Controllers\CommentProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\CommentPost;
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
// manage
Route::get('/manager', function () {
    return view('manager.doashboard');
});
Route::resource('products', ProductController::class);
Route::resource('posts', PostController::class);
Route::resource('comments', CommentProductController::class);
Route::resource('commentpost', CommentPostController::class);
Route::get('/post', [PostController::class, 'getallpublishpost']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
