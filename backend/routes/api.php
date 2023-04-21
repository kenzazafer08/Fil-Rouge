<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\Pcategoriecontroller;
use App\Http\Controllers\postcatcontroller;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\petcontroller;
use App\Http\Controllers\postcontroller;
use App\Http\Controllers\reviewcontroller;
use App\Http\Controllers\cartcontroller;
use App\Http\Controllers\ordercontroller;
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
Route::get('/pets',[petcontroller::class,'index']);
Route::get('/products',[productcontroller::class,'index']);
Route::get('products/{id}',[productcontroller::class,'show']);
Route::get('/price/{id}',[productcontroller::class,'price']);
Route::get('/posts',[postcontroller::class,'index']);
Route::get('/random',[productcontroller::class,'random']);
Route::get('/stock',[productcontroller::class,'stock']);
Route::post('/filter',[productcontroller::class,'filter']);
Route::post('/catfilter',[productcontroller::class,'cat']);
Route::group(['middleware' => 'auth:sanctum'], function(){
  Route::get('user/',[usercontroller::class,'show']);
  Route::post('user/update',[usercontroller::class,'update']);
    Route::group(['middleware' => 'Admin'] , function(){
      Route::get('/statistics',[usercontroller::class,'statistics']);
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

      Route::group(['prefix' => 'order'] , function(){
        Route::get('/{id}',[ordercontroller::class,'show']);
        Route::get('/count',[ordercontroller::class,'count']);
        Route::post('/{id}/status/',[ordercontroller::class,'status']);
      });

      Route::group(['prefix' => 'products'] , function(){
        Route::post('/store',[productcontroller::class,'store']);
        Route::put('/update/{id}',[productcontroller::class,'update']);
        Route::delete('/delete/{id}',[productcontroller::class,'destroy']);
        Route::put('addstock/{id}/',[productcontroller::class,'addstock']);
      });
      Route::group(['prefix' => 'author'] , function(){
        Route::get('/',[usercontroller::class,'author']);
        Route::put('/store/{id}',[usercontroller::class,'changerole']);
        Route::get('/delete/{id}',[usercontroller::class,'remove']);
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
      Route::group(['prefix' => 'posts'] , function(){
        Route::post('/store',[postcontroller::class,'store']);
        Route::put('/update/{id}',[postcontroller::class,'update']);
        Route::delete('/delete/{id}',[postcontroller::class,'destroy']);
        Route::get('/{id}',[postcontroller::class,'show']);
      });
    });
    Route::group(['prefix' => 'review'] , function(){
      Route::post('/store/{id}',[reviewcontroller::class,'store']);
      Route::delete('/{id}',[reviewcontroller::class,'remove']);
    });
    Route::group(['prefix' => 'cart'] , function(){
      Route::get('/',[cartcontroller::class,'index']);
      Route::get('/count',[cartcontroller::class,'count']);
      Route::post('/store/{id}',[cartcontroller::class,'store']);
      Route::delete('/{id}',[cartcontroller::class,'remove']);
      Route::post('/quantity/{id}',[cartcontroller::class,'quantity']);
    });
    Route::group(['prefix' => 'order'] , function(){
      Route::get('/',[ordercontroller::class,'index']);
      Route::post('/store/',[ordercontroller::class,'store']);
      Route::get('/user/',[ordercontroller::class,'user']);
      Route::delete('/delete/{id}',[ordercontroller::class,'destroy']);
    });
    Route::post("logout",[UserController::class,'logout']);
});


Route::get('/images/{filename}', function ($filename) {
  $path = public_path('uploads/' . $filename);
  if (!file_exists($path)) {
      abort(404);
  }
  $file = file_get_contents($path);
  $type = mime_content_type($path);
  $response = response($file, 200);
  $response->header("Content-Type", $type);

  return $response;
});

Route::get('order/{id}',[ordercontroller::class,'facture']);



