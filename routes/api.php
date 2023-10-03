<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClockController;


Route::prefix('v1')->group(function(){
    Route::group([
        'prefix'=>'auth',
        'controller'=>AuthController::class
    ],function () {
        Route::post('/login', 'login');
        Route::post('/register', 'register');
        Route::post('/logout', 'logout');
        Route::post('/refresh', 'refresh');
    });
    
    Route::middleware('jwt')->group(function () {
        Route::get('/', function(){
            return 'losee';
        });

        Route::get('/home', [ClockController::class, 'home']);

        Route::group([
            'prefix' => 'clock',
            'controller'=> ClockController::class
        ], function(){
            Route::get('/', 'index');
            Route::get('/shift', 'shift');
            Route::post('/', 'clock');
            Route::get('/today', 'today');
            Route::get('/location', 'location');
        });
    });
});

