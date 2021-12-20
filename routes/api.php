<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//create post
Route::post('post', [PostController::class, 'create']);
Route::get('post/{post}', [PostController::class, 'show'])->name('post');
Route::post('subscribe/', [SubscriberController::class, 'add']);
//Route::post('post/create', [\App\Models\Subscriber::class, 'store']);
