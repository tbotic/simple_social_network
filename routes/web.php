<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialShareController;

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


Route::get('/', [App\Http\Controllers\FeedController::class, 'index'])->name('feed');
Route::get('/feed_search', [App\Http\Controllers\FeedController::class, 'search'])->name('feed_search');
Route::get('/profile/{id}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/profile_search/{id}', [App\Http\Controllers\ProfileController::class, 'search'])->name('profile_search');
Route::post('/posts_store', [App\Http\Controllers\PostController::class, 'store'])->name('posts_store');
Auth::routes();