<?php

use App\Modules\Settings\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::group(array('module' => 'Settings', 'middleware' => ['auth'], 'namespace' => 'App\Modules\Settings\Controllers'), function() {

    Route::get('institute-information', [SettingsController::class, 'instituteInformation'])->name('institute.information');
    Route::post('institute-information-update', [SettingsController::class, 'instituteInformationUpdate'])->name('institute.information.update');

    Route::get('class-list', [SettingsController::class, 'classList'])->name('class.list');
    Route::post('class-store', [SettingsController::class, 'classStore'])->name('class.store');
    Route::get('class-edit/{id}', [SettingsController::class, 'classEdit'])->name('class.edit');
    Route::post('class-delete/{id}', [SettingsController::class, 'classDelete'])->name('class.delete');

    Route::group(['prefix' => 'department', 'as' => 'settings-department.'], function () {
        Route::get('list', [SettingsController::class, 'departmentList'])->name('list');
        Route::post('store', [SettingsController::class, 'departmentStore'])->name('store');
        Route::get('edit/{id}', [SettingsController::class, 'departmentEdit'])->name('edit');
        Route::post('delete/{id}', [SettingsController::class, 'departmentDelete'])->name('delete');
        Route::get('class-department', [SettingsController::class, 'classDepartment'])->name('class-department');
        Route::get('get-department', [SettingsController::class, 'getDepartment'])->name('get-department');
        Route::post('department-class-store', [SettingsController::class, 'departmentClassStore'])->name('department-class-store');


    });

    Route::group(['prefix' => 'session', 'as' => 'settings-session.'], function () {
        Route::get('list', [SettingsController::class, 'sessionList'])->name('list');
        Route::post('store', [SettingsController::class, 'sessionStore'])->name('store');
        Route::get('edit/{id}', [SettingsController::class, 'sessionEdit'])->name('edit');
        Route::post('delete/{id}', [SettingsController::class, 'sessionDelete'])->name('delete');
    });

    Route::group(['prefix' => 'designation', 'as' => 'settings-designation.'], function () {
        Route::get('list', [SettingsController::class, 'designationList'])->name('list');
        Route::post('store', [SettingsController::class, 'designationStore'])->name('store');
        Route::get('edit/{id}', [SettingsController::class, 'designationEdit'])->name('edit');
        Route::post('delete/{id}', [SettingsController::class, 'designationDelete'])->name('delete');
    });

    Route::group(['prefix' => 'subject ', 'as' => 'settings-subject.'], function () {
        Route::get('list', [SettingsController::class, 'subjectList'])->name('list');
        Route::post('store', [SettingsController::class, 'subjectStore'])->name('store');
        Route::get('edit/{id}', [SettingsController::class, 'subjectEdit'])->name('edit');
        Route::post('delete/{id}', [SettingsController::class, 'subjectDelete'])->name('delete');
    });

});
