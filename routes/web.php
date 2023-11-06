<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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
Route::resource('products', ProductController::class);
Route::resource('categories',CategoryController::class);

Route::get('allproduct',[ProductController::class,'index'])->name('products.index');
Route::get('/products/sort/{order}', [ProductController::class,'sort'])->name('products.sort');


route::post('/create',[CategoryController::class,'create']);
// route::get('/view_category',[CategoryController::class,'index']);
route::get('/delete/{id}',[CategoryController::class,'delete']);


route::put('/editcategory/{id}',[CategoryController::class,'update'])->name('category.update');