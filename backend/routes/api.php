<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\Pcategoriecontroller;
use App\Http\Controllers\postcatcontroller;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\petcontroller;

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
Route::post("login",[UserController::class,'index']);
Route::post("register",[UserController::class,'register']);
Route::get('/categories',[Pcategoriecontroller::class,'index']);
Route::get('/pet',[petcontroller::class,'index']);
Route::get('/products',[productcontroller::class,'index']);
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::group(['middleware' => 'Admin'] , function(){
      Route::get('users',[usercontroller::class,'users']);
      Route::group(['prefix' => 'categories'] , function(){
        Route::post('/store',[Pcategoriecontroller::class,'store']);
        Route::put('/update/{id}',[Pcategoriecontroller::class,'update']);
        Route::delete('/delete/{id}',[Pcategoriecontroller::class,'destroy']);
        Route::get('/{id}',[Pcategoriecontroller::class,'show']);
      });
      Route::group(['prefix' => 'pets'] , function(){
        Route::post('/store',[petcontroller::class,'store']);
        Route::put('/update/{id}',[petcontroller::class,'update']);
        Route::delete('/delete/{id}',[petcontroller::class,'destroy']);
        Route::get('/{id}',[petcontroller::class,'show']);
      });
      Route::group(['prefix' => 'products'] , function(){
        Route::post('/store',[productcontroller::class,'store']);
        Route::put('/update/{id}',[productcontroller::class,'update']);
        Route::delete('/delete/{id}',[productcontroller::class,'destroy']);
        Route::get('/{id}',[productcontroller::class,'show']);
      });
      Route::group(['prefix' => 'author'] , function(){
        Route::get('/',[usercontroller::class,'author']);
        Route::get('/store/{id}',[usercontroller::class,'addauthor']);
        Route::get('/delete/{id}',[usercontroller::class,'removeauthor']);
      });
    });
    Route::group(['middleware' => 'Author' ], function(){
      Route::group(['prefix' => 'postcategorie'] , function(){
        Route::get('/',[postcatcontroller::class,'index']);
        Route::post('/store',[postcatcontroller::class,'store']);
        Route::put('/update/{id}',[postcatcontroller::class,'update']);
        Route::delete('/delete/{id}',[postcatcontroller::class,'destroy']);
        Route::get('/{id}',[postcatcontroller::class,'show']);
      });
    });
    Route::post("logout",[UserController::class,'logout']);
});



