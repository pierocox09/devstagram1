<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PerfilController;


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

Route::get('/', HomeController::class)->name('home');
Route::get('/registrar', [RegisterController::class,'index'])->name('register');
Route::post('/registrar',[RegisterController::class,'store']);
//logincontroller
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);
//logutcontroller
Route::post('/logout',[LogoutController::class,'store'])->name('logout');
//perfil controller

//PostController::
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts/{post}/like',[LikeController::class,'store'])->name('post.likes.store');
Route::delete('/posts/{post}/like',[LikeController::class,'destroy'])->name('post.likes.destroy');


Route::get('/{user:username}/posts/{post}',[PostController::class,'show'])->name('posts.show');
Route::post('/{user:username}/posts/{post}',[ComentarioController::class,'store'])->name('comentarios.store');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');

//imagencontroller
Route::post('/imagenes',[ImageController::class,'store'])->name('imagen.store'); 
 

Route::get('/{user:username}',[PostController::class,'index'])->name('posts.index');
Route::get('/{user:username}/editarperfil', [PerfilController::class,'index'])->name('perfil.index');
Route::post('/{user:username}/editarperfil', [PerfilController::class,'store'])->name('perfil.store');
//Segidores
Route::post('/{user:username}/follow' ,[FollowerController::class,'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow' ,[FollowerController::class,'destroy'])->name('users.unfollow');
