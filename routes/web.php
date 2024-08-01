<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController as RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

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







Route::group(['middleware'=> 'guest'], function(){

    Route::get('/register',[RegisterController::class,'index'])->name('register.view');
    Route::post('/register/save',[RegisterController::class,'store'])->name('register.save');
    Route::get('/',[AuthController::class,'index'])->name('login.view');
    Route::post('/login',[AuthController::class,'login'])->name('login.authenticate');

});


Route::group(['middleware'=>'auth'],function(){

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.view');

    Route::get('/createproject',[ProjectController::class,'create_view'])->name('project.create.view');

    Route::get('/projects',[ProjectController::class,'index'])->name('project.view');

    Route::get('/ideas',[IdeaController::class,'index'])->name('idea.view');

});



