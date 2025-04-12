<?php

use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\MenuController;

// Route::get('/', function () {
//     return view('frontend.index');
// });
Route::get('/', [\App\Http\Controllers\PageController::class, 'index'])->name('index');
Route::get('/bai-viet/{slug}', [\App\Http\Controllers\PageController::class, 'blogDetail'])->name('blogDetail');


Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('setting', GeneralSettingController::class);
    Route::resource('menu', MenuController::class);
});