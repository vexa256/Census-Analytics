<?php

use App\Http\Controllers\CountiesController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

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
Route::middleware(['auth'])->group(function () {

    Route::controller(CountiesController::class)->group(function () {

        Route::get('MgtCounties', 'MgtCounties')->name('MgtCounties');
    });

    Route::controller(DistrictController::class)->group(function () {

        Route::get('MgtDistricts', 'MgtDistricts')->name('MgtDistricts');

    });

    Route::controller(CrudController::class)->group(function () {

        Route::get('DeleteData/{id}/{TableName}', 'DeleteData')
            ->name('DeleteData');

        Route::post('MassUpdate', 'MassUpdate')->name('MassUpdate');

        Route::post('MassInsert', 'MassInsert')->name('MassInsert');
    });

    Route::controller(MainController::class)->group(function () {

        Route::get('AdminDashboard', 'AdminDashboard')->name('AdminDashboard');
        Route::get('dashboard', 'AdminDashboard');
        Route::get('/', 'AdminDashboard');

    });

});

require __DIR__ . '/auth.php';