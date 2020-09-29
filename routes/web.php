<?php

use App\Models\User;
use Tabuna\Breadcrumbs\Trail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeletedUserController;

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
    Route::view('/', 'dashboard')
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->push('Home', route('index'));
        });

    Route::group([
        'prefix' => 'user',
        'as' => 'user.'
    ], function () {
        Route::get('/', [UserController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('user.index')
                    ->push('User Management', route('user.index'));
            });

        Route::get('create', [UserController::class, 'create'])->name('create');

        Route::put('/', [UserController::class, 'store'])->name('store');

        Route::group([
            'prefix' => 'deleted',
            'as' => 'deleted.'
        ], function () {
            Route::get('/', [DeletedUserController::class, 'index'])->name('index');
            Route::patch('{deletedUser}', [DeletedUserController::class, 'restore'])->name('restore');
        });

        Route::prefix('{user}')->group(function() {
            Route::get('/', [UserController::class, 'show'])->name('show');
            Route::get('edit', [UserController::class, 'edit'])->name('edit');
            Route::patch('/', [UserController::class, 'update'])->name('update');
            Route::delete('/', [UserController::class, 'destroy'])->name('delete');
        });
    });
});
