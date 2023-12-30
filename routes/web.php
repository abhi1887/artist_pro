<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "All cleared";
})->name('clear-cache');

Auth::routes();

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('shop');
    Route::post('/save-comment', [App\Http\Controllers\Frontend\HomeController::class, 'saveComment'])->name('save-comment');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.home');
    Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::post('get-comment', [App\Http\Controllers\Admin\AdminController::class, 'getComment'])->name('admin.get-comment');
});

Route::group(['middleware' => ['auth', 'vendor']], function () {
    Route::get('home', [App\Http\Controllers\LoginController::class, 'index'])->name('home');
    Route::get('profile', [App\Http\Controllers\ArtistController::class, 'index'])->name('profile');
    Route::post('profile-update/{id}', [App\Http\Controllers\ArtistController::class, 'update'])->name('profile.update');
});

Route::post('/user-signup', [App\Http\Controllers\Frontend\AuthController::class, 'signUp'])->name('user-signup');
Route::get('/logout', [App\Http\Controllers\Frontend\AuthController::class, 'logout'])->name('customer-logout');