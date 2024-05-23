<?php
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::controller(\App\Http\Controllers\AuthController::class)->group(function (){
   Route::middleware('guest')->group(function ()
   {
      Route::get('/login', 'index')->name('login');
      Route::post('/login', 'login')->name('auth.login');
   });
   Route::middleware('auth:web')->get('/logout','logout')->name('auth.logout');
});

Route::controller(\App\Http\Controllers\FeedBackController::class)->group(function ()
{
        Route::get('/', 'index')->name('feedback.index');
        Route::post('/', 'store')-> name('feedback.store');
});

Route::middleware('auth:web')->group(function ()
{
    Route::get('/mainlayout', [MainController::class, 'MainLayout'])->name('MainLayout');
    Route::resource('users', \App\Http\Controllers\UserController::class)->except('show');
    Route::resource('requests', \App\Http\Controllers\RequestController::class)->except('show');
});



