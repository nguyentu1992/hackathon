<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
// use App\Http\Controllers\Admin\BasicController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/users', UserController::class)->except(['show']);

Route::prefix('admin')->group(function () {
    Route::prefix('basic')->group(function() {
        Route::get('list', [App\Http\Controllers\Admin\BasicController::class, 'list'])->name('basic-list');

        Route::get('add', [App\Http\Controllers\Admin\BasicController::class, 'getAdd'])->name('basic-add');
        Route::post('add', [App\Http\Controllers\Admin\BasicController::class, 'postAdd'])->name('post-basic-add');

        Route::get('edit/{postMeta}', [App\Http\Controllers\Admin\BasicController::class, 'getEdit'])->name('basic-edit');
        Route::post('edit/{postMeta}', [App\Http\Controllers\Admin\BasicController::class, 'postEdit'])->name('post-basic-edit');

        Route::get('delete/{postMeta}', [App\Http\Controllers\Admin\BasicController::class, 'delete'])->name('basic-delete');
    });
});