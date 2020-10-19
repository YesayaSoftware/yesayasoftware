<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SubscriptionController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('login/github', [LoginController::class, 'redirectToProvider']);
Route::get('login/github/callback', [LoginController::class, 'handleProviderCallback']);

// Route::get('/dashboard', function () {
//         return Inertia\Inertia::render('Dashboard');
//     })->name('dashboard');

// Categories
Route::get('/categories', [
        CategoryController::class, 'index'
    ])->name('categories.index');

Route::get('/categories/create', [
        CategoryController::class, 'create'
    ])->name('categories.create');

Route::post('/categories', [
        CategoryController::class, 'store'
    ])->name('categories.store');

Route::get('/categories/{category}', [
        CategoryController::class, 'show'
    ])->name('categories.show');

Route::get('/categories/{category}/edit', [
        CategoryController::class, 'edit'
    ])->name('categories.edit');

Route::put('/categories/{category}', [
        CategoryController::class, 'update'
    ])->name('categories.update');

Route::delete('/categories/thumbnail/{category}', [
        CategoryController::class, 'deleteThumbnail'
    ])->name('categories.delete.thumbnail');

Route::delete('/categories/{category}', [
        CategoryController::class, 'destroy'
    ])->name('categories.destroy');

// Posts
Route::get('/posts', [
        PostController::class, 'index'
    ])->name('posts.index');

Route::get('/posts/create', [
        PostController::class, 'create'
    ])->name('posts.create');

Route::post('/posts', [
        PostController::class, 'store'])
    ->name('posts.store');

Route::get('/posts/{category}/{post}', [
        PostController::class, 'show'
    ])->name('posts.show');

Route::get('/posts/{category}/{post}/edit', [
        PostController::class, 'edit'
    ])->name('posts.edit');

Route::put('/posts/{category}/{post}', [
        PostController::class, 'update'
    ])->name('posts.update');

Route::delete('/posts/thumbnail/{category}', [
        PostController::class, 'deleteThumbnail'
    ])->name('posts.delete.thumbnail');

Route::delete('/posts/{category}/{post}', [
        PostController::class, 'destroy'
    ])->name('posts.destroy');

// Subscription
Route::post('categories/{category}/subscriptions', [
        SubscriptionController::class, 'store'
    ])->name('categories.subscriptions.store');

Route::delete('categories/{category}/subscriptions', [
        SubscriptionController::class, 'destroy'
    ])->name('categories.subscriptions.destroy');

// Favorite
Route::post('favorites/{post}/posts', [
        FavoriteController::class, 'store'
    ])->name('posts.store.favorites');

Route::delete('favorites/{post}/posts', [
        FavoriteController::class, 'destroy'
    ])->name('posts.destroy.favorites');

// Comment
Route::post('/comments/{post}/posts', [
        CommentController::class, 'store'
    ])->name('posts.store.comment');

Route::put('/comments/{comment}', [
        CommentController::class, 'update'
    ])->name('posts.update.comment');

Route::delete('/comments/{comment}', [
        CommentController::class, 'destroy'
    ])->name('posts.destroy.comment');