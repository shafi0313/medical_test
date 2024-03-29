<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\KubPvrController;
use App\Http\Controllers\Backend\PatientController;
use App\Http\Controllers\Backend\TestCatController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\TestReportController;
use App\Http\Controllers\Backend\PatientTestController;
use App\Http\Controllers\Backend\PregnancyProfileController;
use App\Http\Controllers\Backend\WholeAbdomenMaleController;
use App\Http\Controllers\Backend\WholeAbdomenFemaleController;

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
// Route::middleware(['auth','admin'])->prefix('admin')->namespace('Backend')->group(function(){
Route::middleware(['auth','admin'])->prefix('admin')->group(function(){

    Route::get('/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/test-category', TestCatController::class);
    Route::resource('/patient', PatientController::class);
    Route::resource('/patient-test', PatientTestController::class);

    Route::get('/patient-test/show-test/{patient_id}', [PatientTestController::class,'showTest'])->name('patient_show_test');

    // Route::get('/kub-Prv/{id}', [TestReportController::class,'kubPrvIndex'])->name('kubPrv.index');
    // Route::get('/kub-Prv/{id}/create', [TestReportController::class,'kubPrvCreate'])->name('kubPrv.create');
    // Route::post('/kub-Prv/store', [TestReportController::class,'kubPrvStore'])->name('kubPrv.store');

    Route::resource('/kub-Prv', KubPvrController::class)->only(['store','show']);
    Route::get('/kub_Prv/{id}', [KubPvrController::class, 'createId'])->name('kubPrv.create');

    Route::resource('/pregnancy-profile', PregnancyProfileController::class)->only(['store','show']);
    Route::get('/pregnancy_profile/{id}', [PregnancyProfileController::class, 'createId'])->name('pregnancy-profile.create');

    Route::resource('/whole-abdomen-female', WholeAbdomenFemaleController::class)->only(['store','show']);
    Route::get('/whole_abdomen_female/{id}', [WholeAbdomenFemaleController::class, 'createId'])->name('whole-abdomen-female.create');

    Route::resource('/whole-abdomen-male', WholeAbdomenMaleController::class)->only(['store','show']);
    Route::get('/whole_abdomen_male/{id}', [WholeAbdomenMaleController::class, 'createId'])->name('whole-abdomen-male.create');




    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/laraDashboard', [AuthController::class, 'laraDashboard'])->name('laraDashboard');

    // Route::get('/dashboard','DashboardController@index')->name('admin.dashboard');
});






// Route::get('/', function () {
//     return view('welcome');
// });



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
