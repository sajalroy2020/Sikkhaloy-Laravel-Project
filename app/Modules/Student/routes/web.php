<?php

use App\Modules\Student\Http\Controllers\StudentController;
use App\Modules\Student\Http\Controllers\StudentReportController;
use Illuminate\Support\Facades\Route;

Route::group(array('module' => 'Student', 'middleware' => ['auth'], 'namespace' => 'App\Modules\Student\Controllers'), function() {

    Route::group(['prefix' => 'student', 'as' => 'student.'], function () {
        Route::get('list', [StudentController::class, 'studentList'])->name('list');
        Route::get('add', [StudentController::class, 'studentAdd'])->name('add');
        Route::post('store', [StudentController::class, 'studentStore'])->name('store');
        Route::get('edit/{id}', [StudentController::class, 'studentEdit'])->name('edit');
        Route::post('delete/{id}', [StudentController::class, 'studentDelete'])->name('delete');
        Route::get('view/{id}', [StudentController::class, 'studentView'])->name('view');
        Route::get('import', [StudentController::class, 'studentImport'])->name('import');
        Route::post('import/store', [StudentController::class, 'studentImportStore'])->name('import.store');
        Route::get('bulk-update', [StudentController::class, 'bulkUpdate'])->name('bulk.update');
        Route::post('bulk-update-render', [StudentController::class, 'bulkUpdateRender'])->name('bulk.update-render');
        Route::post('bulk-update-store', [StudentController::class, 'bulkUpdateStore'])->name('bulk.update-store');
    });
//
//    Route::group(['prefix' => 'student-update', 'as' => 'student-update.'], function () {
//        Route::get('profile/update', [StudentReportController::class, 'profileUpdate'])->name('profile.update');
//        Route::post('profile/update', [StudentReportController::class, 'profileUpdateAction'])->name('profile.update.action');
//        Route::get('bulk/update', [StudentReportController::class, 'profileUpdate'])->name('bulk.update');
//        Route::post('bulk/update', [StudentReportController::class, 'profileUpdateAction'])->name('bulk.update.action');
//
//    });

    Route::group(['prefix' => 'student-report', 'as' => 'student-report.'], function () {
        Route::get('summary', [StudentReportController::class, 'summary'])->name('summary');
        Route::post('summary-list', [StudentReportController::class, 'summaryList'])->name('summary-list');
        Route::get('details', [StudentReportController::class, 'details'])->name('details');
        Route::post('details-list', [StudentReportController::class, 'detailsList'])->name('details-list');
        Route::get('student-list', [StudentReportController::class, 'studentList'])->name('student-list');
        Route::post('student-profile', [StudentReportController::class, 'studentProfile'])->name('student-profile');
    });

});
