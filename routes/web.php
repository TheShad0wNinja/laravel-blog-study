<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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

Route::get('/', [PostController::class, 'index']);

Route::get('/posts/{post}', [PostController::class, 'show']);
Route::post('/posts/{post}/comments', [PostCommentsController::class, 'store'])->middleware('auth');
Route::get('/posts/{post}/comments/{comment}/delete', [PostCommentsController::class, 'destroy'])->middleware('auth');

Route::middleware('admin')->group(function (){
    Route::get('/admin/posts', [AdminPostController::class, 'index']);
    Route::get('/admin/posts/create', [AdminPostController::class, 'create']);
    Route::post('/admin/posts', [AdminPostController::class, 'store']);
    Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
    Route::put('/admin/posts/{post}', [AdminPostController::class, 'update']);
    Route::delete('/admin/posts/{post}', [AdminPostController::class, 'destroy']);
});

Route::middleware('guest')->group(function (){
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::middleware('guest')->group(function (){
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->name('login');
});


Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');

