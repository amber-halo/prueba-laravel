<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/test', function () {
//     return view('test');
// });

// Route::get('index', [IndexController::class, 'index']);

Route::get('/', [IndexController::class, 'index']);

Route::get('category/{slug}', [CategoryController::class, 'index']);

Route::get('tag/{slug}', [TagController::class, 'index']);

Route::get('post/{slug}', [PostController::class, 'index']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
