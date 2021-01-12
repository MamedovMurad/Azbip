<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\NewsController;
use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Back\CategoryController;
use GuzzleHttp\Middleware;

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

//  Route::get('/ll', [HomeController::class, 'index']); 







Route::group(['namespace'=>'admin', 'prefix' => 'admin',  'middleware' =>'isLogin'], function () {

Route::get('/giris', [AdminController:: class, 'login'])->name('login');
Route::post('/giris', [AdminController:: class, 'loginPost'])->name('login.post');
});

Route::group(['prefix' => 'admin', 'name'=>'admin', 'middleware' =>'isAdmin'], function () {

Route::get('panel', [Dashboard:: class, 'dashboard'])->name('dashboard');


//Xeberler
Route::get('/delete/news/{id}', [NewsController::class, 'delete'])->name('delete.news');
Route::resource('/news', NewsController::class); 
Route::get('/news/silinenler', [NewsController::class, 'trashed'])->name('trashed.news');
Route::get('/switch', [NewsController::class, 'switch'])->name('switch');
Route::get('/harddelete/news/{id}', [NewsController::class, 'hardDelete'])->name('hard.delete.news');
Route::get('/recover/news/{id}', [NewsController::class, 'recover'])->name('recover.news');



Route::get('/cixis', [AdminController:: class, 'logout'])->name('logout');
});

Route::get('xeber-kateqoriya', [CategoryController:: class, 'index'])->name('kateqoriya');
Route::post('xeber-kateqoriya/create',[CategoryController::class, 'create'])->name('category.create');
Route::get('xeber-kateqoriya/getData', [CategoryController::class, 'getData'])->name('category.getdata');
Route::post('xeber-kateqoriya/edit', [CategoryController::class, 'update'])->name('category.update');
Route::get('/switch1', [CategoryController::class, 'switch'])->name('switch1');

//Xeberler
Route::get('/delete/news/{id}', [NewsController::class, 'delete'])->name('delete.news');
Route::resource('/news', NewsController::class); 
Route::get('/news/silinenler', [NewsController::class, 'trashed'])->name('trashed.news');
Route::get('/switch', [NewsController::class, 'switch'])->name('switch');
Route::get('/harddelete/news/{id}', [NewsController::class, 'hardDelete'])->name('hard.delete.news');
Route::get('/recover/news/{id}', [NewsController::class, 'recover'])->name('recover.news');
