<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommentPostController;
use App\Http\Controllers\CommentProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\ProfileController;
use App\Models\CategoryPost;
use App\Models\Product;
use App\Models\CommentPost;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Http\Request;
use App\Http\Controllers\CartController;
use App\Models\Order;

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
// Trang thanh toán
// Route::get('/checkout',[OrderController::class,'index'])->name('orders.index');
// trang index
Route::get('/',[ProductController::class,'getProductHome'])->name('home');
// filter-home
Route::get('/fillter',[ProductController::class,'getNewProducts'])->name('fillter');
// search-home

Route::get('/search',[ProductController::class,'search'])->name('search');
// best-seller
Route::get('/products_new',[ProductController::class,'getNewProducts'])->name('products_new');
// Lưu đơn hàng
Route::resource('orders', OrderController::class);
Route::get('/success', [OrderController::class, 'store'])->name('orders.store');
Route::get('/manager_orders', [OrderController::class, 'managerOrders'])->name('managerOrders');
//managerDonHang
Route::post('orders/update', [OrderController::class,'changeStatus'])->name('orders.changeStatus');
// manage
Route::get('/post', [PostController::class, 'getallpublishpost'])->name('post');
Route::get('/manager', function () {
    return view('manager.doashboard');
});
Route::resource('products', ProductController::class);
Route::resource('posts', PostController::class);
Route::resource('comments', CommentProductController::class);
Route::resource('commentpost', CommentPostController::class);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['web']], function () {
    
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/remove-from-cart/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

use Illuminate\Foundation\Auth\EmailVerificationRequest;
 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

// ... Các tuyến đường khác

require __DIR__.'/auth.php';


Route::get('/manager', function () {
    return view('manager.doashboard');
});
//Dat

Route::resource('categoriesProduct',CategoryController::class);
Route::resource('categoriesPost',CategoryPostController::class);

Route::get('allproduct',[ProductController::class,'getAllProduct'])->name('allproducts.index');
Route::get('/allproduct/sort/{order}', [ProductController::class,'sort'])->name('products.sort');

//Dat CURD CategoryProduct
route::post('/create',[CategoryController::class,'create']);
route::delete('/delete/{id}',[CategoryController::class,'delete'])->name('categoryP.delete');
route::put('/editcategory/{id}',[CategoryController::class,'update'])->name('category.update');

//Dat CURD CategoryPost
route::post('/createPost',[CategoryPostController::class,'create']);
route::delete('/deletePost/{id}',[CategoryPostController::class,'deletePost'])->name('categoryPost.delete');
route::put('/editcategoryPost/{id}',[CategoryPostController::class,'update'])->name('categorypost.update');
