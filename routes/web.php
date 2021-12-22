<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Asset;
use App\Http\Controllers\Category;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/addasset',[Asset::class,'Add']);
Route::post('/senddata',[Asset::class,'senddata']);
Route::get('/catasset',[Category::class,'Cat']);
Route::post('/catdata',[Category::class,'catdata']);
Route::get('/show',[Asset::class,'showdata']);
Route::get('/showdata',[Category::class,'showcategory']);
Route::get('/asset/delete/{id}',[Asset::class,'delete']);
Route::get('/asset/edit/{id}',[Asset::class,'edit']);
Route::post('/asset/update/{id}',[Asset::class,'update']);
Route::get('/barchart',[Asset::class,'index1']);
Route::get('/piechart',[Category::class,'index']);
Route::get('/category/delete/{id}',[Category::class,'delete']);
Route::get('/category/edit/{id}',[Category::class,'edit']);
Route::post('/category/update/{id}',[Category::class,'update']);

