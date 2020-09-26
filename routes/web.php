<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;

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

Route::group(['middleware' => 'auth'], function () {
    Route::view('/', 'dashboard')->name('index');

    Route::group([
        'prefix' => 'user',
        'as' => 'user.'
    ], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');

        Route::get('create', [UserController::class, 'create'])->name('create');

        Route::put('/', [UserController::class, 'store'])->name('store');

        Route::prefix('{user}')->group(function() {
            Route::get('/', [UserController::class, 'show'])->name('show');
            Route::get('edit', [UserController::class, 'edit'])->name('edit');
            Route::patch('/', [UserController::class, 'update'])->name('update');
        });

    });
});
