<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DptController;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MasterController;
use App\Http\Controllers\Admin\SurveyController;
use App\Http\Controllers\Admin\VerifyController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/',[DashboardController::class, 'index'])->name('dashboard')->middleware('Admin:0');

Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

Route::prefix('dashboard')->group(function()
{
    Route::middleware('Admin:0')->group(function () {
        Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
        Route::controller(AjaxController::class)->prefix('ajax')->group(function(){
            Route::get('/{id}/kecamatan', 'getKecamatan')->name('ajax.kecamatan');
            Route::get('/{id}/desa', 'getKelurahan')->name('ajax.kelurahan');
        });
        Route::middleware('Admin:1')->prefix('master')->group(function(){
            Route::controller(UserController::class)->prefix('users')->group(function(){
                Route::get('/', 'index')->name('master.users');
                Route::post('/', 'store')->name('master.users.store');
                Route::get('/{id}', 'edit')->name('master.users.edit');
                Route::post('/{id}', 'update')->name('master.users.update');
                Route::delete('/{id}', 'delete')->name('master.users.delete');
            });
            Route::controller(DptController::class)->prefix('dpt')->group(function(){
                Route::get('/', 'index')->name('master.dpt');
                Route::post('/', 'store')->name('master.dpt.store');
                Route::get('/{id}', 'edit')->name('master.dpt.edit');
                Route::post('/{id}', 'update')->name('master.dpt.update');
                Route::delete('/{id}', 'delete')->name('master.dpt.delete');
            });
            Route::controller(SurveyController::class)->prefix('survey')->group(function(){
                Route::get('/', 'index')->name('survey');
                Route::post('/', 'store')->name('survey.store');
                Route::get('/{id}', 'edit')->name('survey.edit');
                Route::post('/{id}', 'update')->name('survey.update');
                Route::delete('/{id}', 'delete')->name('survey.delete');
            });
            Route::controller(VerifyController::class)->prefix('verify')->group(function(){
                Route::get('/', 'index')->name('verify');
                Route::post('/', 'store')->name('verify.store');
                Route::get('/{id}', 'edit')->name('verify.edit');
                Route::post('/{id}', 'update')->name('verify.update');
                Route::delete('/{id}', 'delete')->name('verify.delete');
            });
        });
    });
}
);
