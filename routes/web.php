<?php

use App\Http\Controllers\AuthorsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Models\authors;
use PharIo\Manifest\Author;

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
Route::get('/hh',function (){
    return "mayank singh";
});
Route::get('/author',[AuthorsController::class,'index']);
Route::get('/author/create',[AuthorsController::class,'create']);
Route::post('/author',[AuthorsController::class,'store']);
Route::patch('/author/{id}',[AuthorsController::class,'update']);
Route::get('/author/{id}/edit',[AuthorsController::class,'edit']);
Route::delete('/author/{id}',[AuthorsController::class,'destroy' ]);
Route::resource('/books',BooksController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
