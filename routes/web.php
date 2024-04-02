<?php

use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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



Route::get('/' , function (){
   return view('dashboard.index');
});

Route::group(['prefix' =>'dashboard' , 'as'=>'dashboard.', 'middleware'=>['auth','CheckLogin']], function (){
    Route::get('/', function (){
        return view('dashboard.layouts.layout');
    })->name('dashboard');

    Route::get('/settings', function (){
      return view('dashboard.settings');
    })->name('settings');
    Route::post('/settings/update/{setting}' ,[SettingController::class , 'update'])->name('settings.update');
    Route::post('/user/all' ,[UserController::class , 'getUsersDatatable'])->name('users.all');
    Route::resources([
        'users'=>UserController::class,
    ]);

});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
