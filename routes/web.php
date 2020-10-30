<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;

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


    // Route::get('/dashboard','DashboardController@index')->name('admin.dashboard');
});






// Route::get('/', function () {
//     return view('welcome');
// });



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
