<?php

use App\Modules\StudentAccounts\Http\Controllers\StudentFeeCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('student-accounts', 'StudentAccountsController@welcome');

Route::group(['prefix' => 'student-fee-category', 'as' => 'student-fee-category.'], function () {
    Route::get('list', [StudentFeeCategoryController::class, 'list'])->name('list');
});
