<?php

use App\Http\Controllers\LogoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Models\Logo;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/manager', function () {
    return view('manager.user.manager_user');
});



//Quản lý profile người dùng
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('profile', ProfileController::class);
    Route::get('/upload.cover/{id}', [ProfileController::class, 'uploadCover'])->name('upload.cover');
});


//Quản lý user
Route::resource('users', UserController::class);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::get('/users/{user}/unDisable', [UserController::class, 'unDisable'])->name('users.unDisable');
Route::get('/users/{user}/disable', [UserController::class, 'disable'])->name('users.disable');
// Trang doashboard
Route::get('/doashboard', function () {
    return view('manager.dashboard');
});


//Setting
Route::resource('logo', LogoController::class);




require __DIR__ . '/auth.php';
