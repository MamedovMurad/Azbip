<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\NewsController;
use App\Http\Controllers\Front\HomeController;
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

Route::get('/ll', [HomeController::class, 'index']);

Route::get('/', function () {
    return view('dashboard');
});

Route::get('login', function () {
    return view('login');
});
Route::get('xeberler', function () {
    return view('news');
});
Route::get('elave-et-xeber', function () {
    return view('news_form');
});

//Xeberler
Route::get('/delete/news/{id}', NewsController::class, '__invoke')->name('__invoke');
Route::resource('/news', NewsController::class);
Route::get('/news/silinenler', NewsController::class, 'trashed', ['name' => 'trashed.news'] );
Route::get('/switch', NewsController::class, 'switch', ['name' => 'switch'] );

Route::get('/harddelete/news/{id}', NewsController::class, 'hardDelete', ['name' => 'hard.delete.news'] );
Route::get('/recover/news/{id}', NewsController::class, 'recover', ['name' => 'recover.news'] );
