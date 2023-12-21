<?php


use App\Http\Controllers\Api\V1\Auth\OtpController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



//v1 auth routes

Route::namespace('Api')->name('api.')->group(function (){


        Route::namespace('/V1')->prefix('v1')->name('v1.')->group(function (){

            Route::middleware('throttle:3,1')->group(function (){

                Route::post('/register' , [RegisterController::class , 'register'])->name('register');
                Route::post('/login' , [LoginController::class , 'login'])->name('login');
                Route::post('/logout' , [LoginController::class , 'logout'])->middleware('auth:sanctum')->name('logout');



                Route::get('/opt-auth' , [OtpController::class , 'send'])->name('opt-auth');
                Route::get('/opt-confirmation' , [OtpController::class , ''])->name('opt-confirmation');
            });





        });


});
