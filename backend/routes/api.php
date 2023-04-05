<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;

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

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('users',[usercontroller::class,'users'])->middleware('Admin');
    Route::post("logout",[UserController::class,'logout']);
});

Route::post("login",[UserController::class,'index']);
Route::post("register",[UserController::class,'register']);

