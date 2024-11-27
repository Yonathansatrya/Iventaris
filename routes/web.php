<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;

Route::get('/', [AuthController::class, 'LoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['Jabatan:Laboran'])->group(
    function () {
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('laboran.dashboard');

        Route::prefix('items')->group(function () {
            // CRUD untuk ItemsIn
            Route::post('/in', [ItemController::class, 'createItemIn']);
            Route::get('/in/{id}', [ItemController::class, 'getItemIn']);
            Route::put('/in/{id}', [ItemController::class, 'updateItemIn']);
            Route::delete('/in/{id}', [ItemController::class, 'deleteItemIn']);

            // CRUD untuk ItemUse
            Route::post('/use', [ItemController::class, 'createItemUse']);
            Route::get('/use/{id}', [ItemController::class, 'getItemUse']);
            Route::put('/use/{id}', [ItemController::class, 'updateItemUse']);
            Route::delete('/use/{id}', [ItemController::class, 'deleteItemUse']);

            // CRUD untuk DamageItem
            Route::post('/damage', [ItemController::class, 'createDamageItem']);
            Route::get('/damage/{id}', [ItemController::class, 'getDamageItem']);
            Route::put('/damage/{id}', [ItemController::class, 'updateDamageItem']);
            Route::delete('/damage/{id}', [ItemController::class, 'deleteDamageItem']);

            // CRUD untuk RepairDamageItem
            Route::post('/repair', [ItemController::class, 'createRepairDamageItem']);
            Route::get('/repair/{id}', [ItemController::class, 'getRepairDamageItem']);
            Route::put('/repair/{id}', [ItemController::class, 'updateRepairDamageItem']);
            Route::delete('/repair/{id}', [ItemController::class, 'deleteRepairDamageItem']);
        });

        Route::prefix('loans')->group(function () {
            Route::get('/', [LoanController::class, 'index'])->name('loans.index');
            Route::get('{id}', [LoanController::class, 'show'])->name('loans.show');
            Route::post('/', [LoanController::class, 'createLoan'])->name('loans.create');
            Route::put('{id}', [LoanController::class, 'updateLoan'])->name('loans.update');
            Route::delete('{id}', [LoanController::class, 'deleteLoan'])->name('loans.delete');
        });

        Route::prefix('loan_conditions')->group(function () {
            Route::post('/', [LoanController::class, 'createLoanCondition'])->name('loan_conditions.create');
            Route::get('{id}', [LoanController::class, 'getLoanCondition'])->name('loan_conditions.show');
            Route::put('{id}', [LoanController::class, 'updateLoanCondition'])->name('loan_conditions.update');
            Route::delete('{id}', [LoanController::class, 'deleteLoanCondition'])->name('loan_conditions.delete');
        });

        Route::prefix('responsibility_loans')->group(function () {
            Route::post('/', [LoanController::class, 'createResponsibilityLoan'])->name('responsibility_loans.create');
            Route::get('{id}', [LoanController::class, 'getResponsibilityLoan'])->name('responsibility_loans.show');
            Route::put('{id}', [LoanController::class, 'updateResponsibilityLoan'])->name('responsibility_loans.update');
            Route::delete('{id}', [LoanController::class, 'deleteResponsibilityLoan'])->name('responsibility_loans.delete');
        });
    }
);

Route::get('password/reset', [AuthController::class, 'RequestForm'])->name('password.request');
Route::post('password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [AuthController::class, 'showReset'])->name('password.reset');
Route::post('password/reset', [AuthController::class, 'reset'])->name('password.update');
