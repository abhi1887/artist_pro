<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->group( function () {
    Route::get('/', [App\Http\Controllers\Api\HomeController::class, 'index'])->name('shop');
    Route::get('/edit-designer-profile', [App\Http\Controllers\Api\HomeController::class, 'editDesignerProfile'])->name('edit-designer-profile');
    Route::get('/fashion-designer', [App\Http\Controllers\Api\HomeController::class, 'fashionDesigner'])->name('fashion-designer');
    Route::get('/single-product', [App\Http\Controllers\Api\HomeController::class, 'singleProduct'])->name('single-product');
    Route::get('/wedding', [App\Http\Controllers\Api\HomeController::class, 'wedding'])->name('wedding');
});