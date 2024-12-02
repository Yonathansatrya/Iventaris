<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'LoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['Jabatan:Laboran'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('laboran.dashboard');

    Route::prefix('items')->group(function () {
        Route::prefix('in')->group(function () {
            Route::get('/inventaris', [ItemController::class, 'indexInventaris'])->name('items_in.inventaris');
            Route::get('/bahan', [ItemController::class, 'indexBahan'])->name('items_in.bahan');
            Route::get('/create', [ItemController::class, 'createItemsIn'])->name('items_in.create');
            Route::post('/', [ItemController::class, 'storeItemsIn'])->name('items_in.store');
            Route::get('/{id}', [ItemController::class, 'showItemsIn'])->name('items_in.show');
            Route::get('/{id}/edit', [ItemController::class, 'editItemsIn'])->name('items_in.edit');
            Route::put('/{id}', [ItemController::class, 'updateItemsIn'])->name('items_in.update');
            Route::delete('/{id}', [ItemController::class, 'deleteItemsIn'])->name('items_in.delete');
        });


        Route::prefix('use')->group(function () {
            Route::get('/', [ItemController::class, 'indexItemUse'])->name('items.use.index');
            Route::get('/create', [ItemController::class, 'createItemUse'])->name('items.use.create');
            Route::post('/', [ItemController::class, 'storeItemUse'])->name('items.use.store');
            Route::get('/{id}/edit', [ItemController::class, 'editItemUse'])->name('items.use.edit');
            Route::put('/{id}', [ItemController::class, 'updateItemUse'])->name('items.use.update');
            Route::delete('/{id}', [ItemController::class, 'deleteItemUse'])->name('items.use.delete');
        });

        Route::prefix('damage')->group(function () {
            Route::get('/', [ItemController::class, 'indexDamageItem'])->name('items.damage.index');
            Route::get('/create', [ItemController::class, 'createDamageItem'])->name('items.damage.create');
            Route::post('/', [ItemController::class, 'storeDamageItem'])->name('items.damage.store');
            Route::get('/{id}/edit', [ItemController::class, 'editDamageItem'])->name('items.damage.edit');
            Route::put('/{id}', [ItemController::class, 'updateDamageItem'])->name('items.damage.update');
            Route::delete('/{id}', [ItemController::class, 'deleteDamageItem'])->name('items.damage.delete');
        });

        Route::prefix('repair')->group(function () {
            Route::get('/', [ItemController::class, 'indexRepairDamageItem'])->name('items.repair.index');
            Route::get('/create', [ItemController::class, 'createRepairDamageItem'])->name('items.repair.create');
            Route::post('/', [ItemController::class, 'storeRepairDamageItem'])->name('items.repair.store');
            Route::get('/{id}/edit', [ItemController::class, 'editRepairDamageItem'])->name('items.repair.edit');
            Route::put('/{id}', [ItemController::class, 'updateRepairDamageItem'])->name('items.repair.update');
            Route::delete('/{id}', [ItemController::class, 'deleteRepairDamageItem'])->name('items.repair.delete');
        });

    });

    Route::prefix('loans')->group(function () {
        Route::get('/', [LoanController::class, 'indexLoans'])->name('loans.index');
        Route::get('/create', [LoanController::class, 'createLoan'])->name('loans.create');
        Route::post('/', [LoanController::class, 'storeLoan'])->name('loans.store');
        Route::get('/{id}/edit', [LoanController::class, 'editLoan'])->name('loans.edit');
        Route::put('/{id}', [LoanController::class, 'updateLoan'])->name('loans.update');
        Route::delete('/{id}', [LoanController::class, 'deleteLoan'])->name('loans.delete');
    });

    Route::prefix('loan_conditions')->group(function () {
        Route::get('/', [LoanController::class, 'indexLoanConditions'])->name('loans_conditions.index');
        Route::get('/create', [LoanController::class, 'createLoanCondition'])->name('loans_conditions.create');
        Route::post('/', [LoanController::class, 'storeLoanCondition'])->name('loans_conditions.store');
        Route::get('/{id}/edit', [LoanController::class, 'editLoanCondition'])->name('loans_conditions.edit');
        Route::put('/{id}', [LoanController::class, 'updateLoanCondition'])->name('loans_conditions.update');
        Route::delete('/{id}', [LoanController::class, 'deleteLoanCondition'])->name('loans_conditions.delete');
    });

    Route::prefix('responsibility_loans')->group(function () {
        Route::get('/', [LoanController::class, 'indexResponsibilityLoans'])->name('responsibility_loans.index');
        Route::get('/create', [LoanController::class, 'createResponsibilityLoan'])->name('responsibility_loans.create');
        Route::post('/', [LoanController::class, 'storeResponsibilityLoan'])->name('responsibility_loans.store');
        Route::get('/{id}/edit', [LoanController::class, 'editResponsibilityLoan'])->name('responsibility_loans.edit');
        Route::put('/{id}', [LoanController::class, 'updateResponsibilityLoan'])->name('responsibility_loans.update');
        Route::delete('/{id}', [LoanController::class, 'deleteResponsibilityLoan'])->name('responsibility_loans.delete');
    });

});

Route::get('password/reset', [AuthController::class, 'RequestForm'])->name('password.request');
Route::post('password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [AuthController::class, 'showReset'])->name('password.reset');
Route::post('password/reset', [AuthController::class, 'reset'])->name('password.update');
