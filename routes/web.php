<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\CategoryPost;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

Route::get('/search',[ProductController::class,'search'])->name('search');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/manager', function () {
    return view('manager.doashboard');
});
//Dat

Route::resource('categoriesProduct',CategoryController::class);
Route::resource('categoriesPost',CategoryPostController::class);

Route::get('allproduct',[ProductController::class,'getAllProduct'])->name('products.index');
Route::get('/allproduct/sort/{order}', [ProductController::class,'sort'])->name('products.sort');

//Dat CURD CategoryProduct
route::post('/create',[CategoryController::class,'create']);
route::delete('/delete/{id}',[CategoryController::class,'delete'])->name('categoryP.delete');
route::put('/editcategory/{id}',[CategoryController::class,'update'])->name('category.update');

//Dat CURD CategoryPost
route::post('/createPost',[CategoryPostController::class,'create']);
route::get('/deletePost/{id}',[CategoryPostController::class,'deletePost']);
route::put('/editcategoryPost/{id}',[CategoryPostController::class,'update'])->name('categorypost.update');
