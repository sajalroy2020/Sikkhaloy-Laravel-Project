<?php

use App\Modules\AccountsManagement\Http\Controllers\ReceiptHeadController;
use Illuminate\Support\Facades\Route;

Route::get('accounts-management', 'AccountsManagementController@welcome');

Route::group(['prefix' => 'accounts-management', 'as' => 'accounts-management.'], function () {
    Route::get('receipt-head-list', [ReceiptHeadController::class, 'list'])->name('receipt-head-list');
    Route::post('receipt-head-store', [ReceiptHeadController::class, 'store'])->name('receipt-head-store');

});
