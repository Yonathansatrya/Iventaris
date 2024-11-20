<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemConditionController;
use App\Http\Controllers\ItemGetController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'LoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['Jabatan:Laboran'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('laboran.dashboard');

    Route::prefix('loans')->name('loans.')->group(function () {
        Route::get('/', [LoanController::class, 'index'])->name('index');
        Route::get('/create', [LoanController::class, 'create'])->name('create');
        Route::post('/', [LoanController::class, 'store'])->name('store');
        Route::get('/{loan}', [LoanController::class, 'show'])->name('show');
        Route::get('/{loan}/edit', [LoanController::class, 'edit'])->name('edit');
        Route::put('/{loan}', [LoanController::class, 'update'])->name('update');
        Route::delete('/{loan}', [LoanController::class, 'destroy'])->name('destroy');
        Route::post('/{loan}/return', [LoanController::class, 'returnItem'])->name('return');
    });

    Route::prefix('item')->name('items.')->group(function () {
        Route::get('/', [ItemController::class, 'index'])->name('index');
        Route::get('/create', [ItemController::class, 'create'])->name('create');
        Route::post('/', [ItemController::class, 'store'])->name('store');
        Route::get('/{item}', [ItemController::class, 'show'])->name('show');
        Route::get('/{item}/edit', [ItemController::class, 'edit'])->name('edit');
        Route::put('/{item}', [ItemController::class, 'update'])->name('update');
        Route::delete('/{item}', [ItemController::class, 'destroy'])->name('destroy');
    });

});

Route::get('forgot-password', [AuthController::class, 'RequestForm'])->name('password.request');
Route::post('forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [AuthController::class, 'showReset'])->name('password.reset');
Route::post('reset-password', [AuthController::class, 'reset'])->name('password.update');

Route::prefix('item_conditions')->name('item_conditions.')->group(function () {
    Route::get('/', [ItemConditionController::class, 'index'])->name('index');
    Route::get('/create', [ItemConditionController::class, 'create'])->name('create');
    Route::post('/', [ItemConditionController::class, 'store'])->name('store');
    Route::get('/{itemCondition}', [ItemConditionController::class, 'show'])->name('show');
    Route::get('/{itemCondition}/edit', [ItemConditionController::class, 'edit'])->name('edit');
    Route::put('/{itemCondition}', [ItemConditionController::class, 'update'])->name('update');
    Route::delete('/{itemCondition}', [ItemConditionController::class, 'destroy'])->name('destroy');
});



Route::prefix('item_gets')->name('item_gets.')->group(function () {
    Route::get('/', [ItemGetController::class, 'index'])->name('index');
    Route::get('/create', [ItemGetController::class, 'create'])->name('create');
    Route::post('/', [ItemGetController::class, 'store'])->name('store');
    Route::get('/{itemGet}/edit', [ItemGetController::class, 'edit'])->name('edit');
    Route::put('/{itemGet}', [ItemGetController::class, 'update'])->name('update');
    Route::delete('/{itemGet}', [ItemGetController::class, 'destroy'])->name('destroy');
});

