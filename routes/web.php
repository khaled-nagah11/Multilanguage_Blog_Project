<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
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

    Route::get('/users/all' ,[UserController::class , 'getUsersDatatable'])->name('users.all');
    Route::post('/users/delete' ,[UserController::class , 'delete'])->name('users.delete');

    Route::get('/category/all' ,[CategoryController::class , 'getCategoriesDatatable'])->name('category.all');
    Route::post('/category/delete' ,[CategoryController::class , 'delete'])->name('category.delete');

    Route::get('/posts/all' ,[PostController::class , 'getPostsDatatable'])->name('posts.all');
    Route::post('/posts/delete' ,[PostController::class , 'delete'])->name('posts.delete');


    Route::resources([
        'users'=>UserController::class,
        'category'=>CategoryController::class,
        'posts'=>PostController::class,
    ]);

});
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
