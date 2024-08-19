<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController as RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\GitHubController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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


/* TODO: Verification email user

1 Route: Le aviso despues de resgitrarse que debe dar click al link enviado al correo
2 Route: Manejar las solicitudes uan vez el usuario de clic en el email
3 Route: Reenviar el link al correo si el usuario pierde el primer link

*/

//TODO: Routes Email verification

    Route::get('/email/verify', function(){
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}',[RegisterController::class,'verifyEmail'] )->middleware(['auth','signed'])->name('verification.verify');

    Route::post('/email/verification-notification', [RegisterController::class,'requestEmailVerification'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::group(['middleware'=> 'guest'], function(){

    Route::get('/register',[RegisterController::class,'index'])->name('register.view');


    Route::post('/register/save',[RegisterController::class,'store'])->name('register.save');
    Route::get('/',[AuthController::class,'index'])->name('login.view');
    Route::post('/login',[AuthController::class,'login'])->name('login.authenticate');


});





Route::middleware(['auth','verified'])->group( function() {


    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.view');
    Route::get('/email-verification',[DashboardController::class,'index_email'])->name('email.view');

    // Routes projects
    Route::get('/createproject',[ProjectController::class,'create_view'])->name('project.create.view');
    Route::get('/projects',[ProjectController::class,'index'])->name('project.view');
    Route::post('/projects/create',[ProjectController::class,'create'])->name('project.create');
    Route::put('/projects/edit/{id}',[ProjectController::class,'edit'])->name('project.edit');
    Route::delete('/projects/delete/{id}',[ProjectController::class,'delete'])->name('project.delete');

    //Routes Ideas
    Route::get('/ideas',[IdeaController::class,'index'])->name('idea.view');
    Route::post('/ideas/create',[IdeaController::class,'create'])->name('idea.create');
    Route::put('/ideas/edit/{id}',[IdeaController::class,'edit'])->name('idea.edit');
    Route::delete('/ideas/delete/{id}',[IdeaController::class,'delete'])->name('idea.delete');

    // Routes repositories
    Route::get('/repositories',[GitHubController::class,'show'])->name('repository.view');

    // Route logout
    Route::post('/logout',[AuthController::class,'logout'])->name('logout.view');
});



