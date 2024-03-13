<?php

use App\Http\Controllers\Client\StatementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::group(['namespace' => 'App\Http\Controllers\Client', 'middleware' => 'auth'], function () {
    Route::get('/', [StatementController::class, 'index'])->name('main');
    Route::get('/statements/create', [StatementController::class, 'create'])->name('statements.create');
    Route::post('/statements', [StatementController::class, 'store'])->name('statements.store');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/', 'StatementController@index')->name('admin.statements.index');
    Route::patch('/statements/{statement}', 'StatementController@update')->name('admin.statements.update');
});

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'create'])->name('register.create');
    Route::post('/register', [AuthController::class, 'store'])->name('register.store');

    Route::get('/login', [AuthController::class, 'createLogin'])->name('login.create');
    Route::post('/login', [AuthController::class, 'storeLogin'])->name('login.store');
});
