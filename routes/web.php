<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\DivisionsController;
use App\Http\Controllers\Admin\PositionsController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\WorkhoursController;
use App\Http\Controllers\Admin\ClocklocationsController;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\LoginController;

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

Route::middleware('Admin:admin,superadmin')->get('/', function () {
    return view('welcome');
});

Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

Route::prefix('admin')->group(function()
{
    Route::middleware('Admin:admin,superadmin,hrd')->group(function () {
        Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
        Route::controller(EmployeeController::class)->prefix('employee')->group(function()
        {
            Route::get('/','index')->name('employee');
            Route::get('/create','create')->name('employee.create');
            Route::post('/','store')->name('employee.store');
            Route::get('/{id}/profile','edit_profile')->name('employee.edit_profile');
            Route::post('/{id}/profile','update_profile')->name('employee.update_profile');
            Route::get('/{id}/employee','edit_employee')->name('employee.edit_employee');
            Route::post('/{id}/employee','update_employee')->name('employee.update_employee');
            Route::get('/test','destroy')->name('employee.test');
        });
        Route::controller(AjaxController::class)->prefix('ajax')->group(function()
        {
            Route::get('/division/{id}','getDivision')->name('ajax.division');
            Route::get('/position/{id}','getPosition')->name('ajax.position');
            Route::post('/userValidate','userValidate')->name('ajax.uservalidate');
            Route::post('/profilevalidate','profilevalidate')->name('ajax.profilevalidate');
        });

        Route::middleware('Admin:superadmin,hrd')->group(function () {


            Route::controller(AttendanceController::class)->prefix('attendance')->group(function()
            {
                Route::get('/','index')->name('absensi.attendance');
                Route::get('/create','create')->name('absensi.attendance.create');
                Route::post('/','store')->name('absensi.attendance.store');
                Route::delete('/{id}','destroy')->name('absensi.attendance.destroy');
                Route::get('/export','export')->name('absensi.attendance.export');
                Route::get('/{id}','edit')->name('absensi.attendance.edit');
                Route::post('/{id}','update')->name('absensi.attendance.update');
            });

            Route::middleware('Admin:superadmin')->group(function () {
                Route::controller(usersController::class)->prefix('users')->group(function()
                {
                    Route::get('/','index')->name('masters.users');
                    Route::get('/create','create')->name('masters.users.create');
                });
                Route::controller(DivisionsController::class)->prefix('division')->group(function()
                {
                    Route::get('/','index')->name('masters.division');
                    Route::get('/create','create')->name('masters.division.create');
                    Route::post('/','store')->name('masters.division.store');
                    Route::delete('/{id}','destroy')->name('masters.division.destroy');
                    Route::get('/{id}','edit')->name('masters.division.edit');
                    Route::post('/{id}','update')->name('masters.division.update');
                });
            
                Route::controller(PositionsController::class)->prefix('position')->group(function()
                {
                    Route::get('/','index')->name('masters.position');
                    Route::get('/create','create')->name('masters.position.create');
                    Route::post('/','store')->name('masters.position.store');
                    Route::delete('/{id}','destroy')->name('masters.position.destroy');
                    Route::get('/{id}','edit')->name('masters.position.edit');
                    Route::post('/{id}','update')->name('masters.position.update');
                });

                Route::controller(WorkhoursController::class)->prefix('work_schedule')->group(function()
                {
                    Route::get('/','index')->name('absensi.workhours');
                    Route::get('/create','create')->name('absensi.workhours.create');
                    Route::post('/','store')->name('absensi.workhours.store');
                    Route::delete('/{id}','destroy')->name('absensi.workhours.destroy');
                    Route::get('/{id}','edit')->name('absensi.workhours.edit');
                    Route::post('/{id}','update')->name('absensi.workhours.update');
                });
                Route::controller(WorkhoursController::class)->prefix('shift')->group(function()
                {
                    Route::get('/','index_shift')->name('absensi.shift');
                    // Route::get('/create','create')->name('absensi.shift.create');
                    // Route::post('/','store')->name('absensi.shift.store');
                    // Route::delete('/{id}','destroy')->name('absensi.shift.destroy');
                    // Route::get('/{id}','edit')->name('absensi.shift.edit');
                    // Route::post('/{id}','update')->name('absensi.shift.update');
                });
            
                Route::controller(ClocklocationsController::class)->prefix('clocklocations')->group(function()
                {
                    Route::get('/','index')->name('absensi.clocklocations');
                    Route::get('/create','create')->name('absensi.clocklocations.create');
                    Route::post('/','store')->name('absensi.clocklocations.store');
                    Route::delete('/{id}','destroy')->name('absensi.clocklocations.destroy');
                    Route::get('/{id}','edit')->name('absensi.clocklocations.edit');
                    Route::post('/{id}','update')->name('absensi.clocklocations.update');
                });
            });
        });
    });


}
);
