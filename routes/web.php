<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DistrictAndThanaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/register', function () {
    return redirect()->route('login');
})->name('register');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('get-thana-list-by-district', [DistrictAndThanaController::class, 'getThanaListByDistrict'])->name('get-thana-list-by-district');

