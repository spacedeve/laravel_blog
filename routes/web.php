<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
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
//Home
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('about', [HomeController::class, 'about'])->name('about');

//Blog
Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blogs/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blogs', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
Route::patch('/blogs/{blog}', [BlogController::class, 'update'])->name('blog.update');
Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blog.delete');
