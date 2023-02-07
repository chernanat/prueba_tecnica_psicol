<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix'=>'','controller'=>\App\Http\Controllers\UserController::class],function(){
    Route::name('')->group(function(){
        Route::get('/','login')->name('');
        Route::get('/register','register')->name('');
        Route::get('/register/teacher','registerTeacher')->name('');
        Route::get('/register/student','registerStudent')->name('');
        Route::get('/register/signature','registerSignature')->name('');
        Route::post('/save','store')->name('');
        Route::get('/home','index')->name('');
        Route::get('/user/{person}','edit');
        Route::post('/user/{person}','update');
        Route::get('/getusers','getUsers');
        Route::get('/getteachers','getTeachers');
    });
});

Route::group(['prefix'=>'/signature','controller'=> \App\Http\Controllers\SignatureController::class],function(){
    Route::name('')->group(function(){
        Route::post('/save','store')->name('');
        Route::get('/edit/{signature}','edit');
        Route::post('/edit/{signature}','update');
    });
});

//to login and logout
Route::group(['prefix'=>'/sign','controller'=>\App\Http\Controllers\LoginController::class],function(){
    Route::name('')->group(function(){
        Route::post('/login','login')->name('');
        Route::post('/logout','logout')->name('');
    });
});