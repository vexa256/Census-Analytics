<?php

use App\Http\Controllers\CountiesController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\HouseholdsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ParishesController;
use App\Http\Controllers\SubCountiesController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\VillagesController;
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

    Route::controller(SurveyController::class)->group(function () {

        Route::any('CensusReport/{Year}', 'CensusReport')->name('CensusReport');

        Route::any('AcceptYearSelect', 'AcceptYearSelect')->name('AcceptYearSelect');

        Route::any('SelectYear', 'SelectYear')->name('SelectYear');

        Route::any('AcceptHouseholdSelection', 'AcceptHouseholdSelection')->name('AcceptHouseholdSelection');

        Route::get('SurveyHousehold/{id}', 'SurveyHousehold')->name('SurveyHousehold');

        Route::get('SelectHousehold', 'SelectHousehold')->name('SelectHousehold');

    });

    Route::controller(HouseholdsController::class)->group(function () {

        Route::get('MgtHouseHolds', 'MgtHouseHolds')->name('MgtHouseHolds');

        Route::post('NewHousehold', 'NewHousehold')->name('NewHousehold');

    });

    Route::controller(VillagesController::class)->group(function () {

        Route::get('MgtVillages', 'MgtVillages')->name('MgtVillages');

    });

    Route::controller(ParishesController::class)->group(function () {

        Route::get('MgtParishes', 'MgtParishes')->name('MgtParishes');

    });

    Route::controller(SubCountiesController::class)->group(function () {

        Route::get('MgtSubCounties', 'MgtSubCounties')->name('MgtSubCounties');
    });

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

        Route::post('UpdateAccount', 'UpdateAccount')->name('UpdateAccount');
        Route::get('MgtUserRoles', 'MgtUserRoles')->name('MgtUserRoles');
        Route::get('ManageAgents', 'ManageAgents')->name('ManageAgents');
        Route::get('AdminDashboard', 'AdminDashboard')->name('AdminDashboard');
        Route::get('dashboard', 'AdminDashboard');
        Route::get('/', 'AdminDashboard');

    });

});

require __DIR__ . '/auth.php';