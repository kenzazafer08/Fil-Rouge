<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\Pcategoriecontroller;
use App\Http\Controllers\productcontroller;

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
    Route::group(['middleware' => 'Admin'] , function(){
      Route::get('users',[usercontroller::class,'users']);
      Route::group(['prefix' => 'categories'] , function(){
        Route::get('/',[Pcategoriecontroller::class,'index']);
        Route::post('/store',[Pcategoriecontroller::class,'store']);
        Route::put('/update/{id}',[Pcategoriecontroller::class,'update']);
        Route::delete('/delete/{id}',[Pcategoriecontroller::class,'destroy']);
        Route::get('/{id}',[Pcategoriecontroller::class,'show']);
      });
      Route::group(['prefix' => 'products'] , function(){
        Route::get('/',[productcontroller::class,'index']);
        Route::post('/store',[productcontroller::class,'store']);
        Route::put('/update/{id}',[productcontroller::class,'update']);
        Route::delete('/delete/{id}',[productcontroller::class,'destroy']);
        Route::get('/{id}',[productcontroller::class,'show']);
      });
    });
    Route::post("logout",[UserController::class,'logout']);
});

Route::post("login",[UserController::class,'index']);
Route::post("register",[UserController::class,'register']);

