<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;

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

Route::get('/email/verify', function () {
    return Inertia::render('Auth/VerifyEmail');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('login/github', [LoginController::class, 'redirectToProvider']);
Route::get('login/github/callback', [LoginController::class, 'handleProviderCallback']);

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
    CategoryController::class, 'removeThumbnail'
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

Route::get('/posts/{post}', [
    PostController::class, 'show'
])->name('posts.show');

Route::get('/posts/{post}/edit', [
    PostController::class, 'edit'
])->name('posts.edit');

Route::put('/posts/{post}', [
    PostController::class, 'update'
])->name('posts.update');

Route::delete('/posts/thumbnail/{category}', [
    PostController::class, 'removeThumbnail'
])->name('posts.delete.thumbnail');

Route::delete('/posts/{post}', [
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

// Podcasts
Route::get('/podcasts', [
    PodcastController::class, 'index'
])->name('podcast.index');

// Privacy Policy
Route::get('/privacy', function () {
    return Inertia::render('PrivacyPolicy');
})->name('privacy');

// Terms
Route::get('/terms', function () {
    return Inertia::render('TermsOfService');
})->name('terms');

//Subscribers
Route::post('subscribe', [
        SubscribeController::class, 'store']
)->name('subscribe.store');

//News Letter
Route::get('/newsletters', [
    NewsletterController::class, 'index'
])->name('newsletters.index');

Route::get('/newsletters/create', [
    NewsletterController::class, 'create'
])->name('newsletters.create');

Route::post('/newsletters', [
    NewsletterController::class, 'store'
])->name('newsletters.store');

Route::get('/newsletters/{newsletter}', [
    NewsletterController::class, 'show'
])->name('newsletters.show');

Route::get('/newsletters/{newsletter}/edit', [
    NewsletterController::class, 'edit'
])->name('newsletters.edit');

Route::put('/newsletters/{newsletter}', [
    NewsletterController::class, 'update'
])->name('newsletters.update');

Route::delete('/newsletters/thumbnail/{newsletter}', [
    NewsletterController::class, 'removeThumbnail'
])->name('newsletters.delete.thumbnail');

Route::delete('/newsletters/{newsletter}', [
    NewsletterController::class, 'destroy'
])->name('newsletters.destroy');

Route::post('/newsletters/{newsletter}/publish', [
    NewsletterController::class, 'publish'
])->name('newsletters.publish');
