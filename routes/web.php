<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetailProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ViewController;
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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/profile', [AuthController::class, 'showProfile']);
    Route::get('/', [MenuController::class, 'index']);
    Route::get('/public', [MenuController::class, 'myDataPublic']);
    Route::get('/private', [MenuController::class, 'myDataPrivate']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

    // Profile
    Route::get('/profile/update', [DetailProfileController::class, 'viewUpdate']);

    // Menu
    Route::get('/create-data', [MenuController::class, 'viewCreateMenu']);
    Route::post('/create-data', [MenuController::class, 'createMenu'])->name('menu');
    Route::get('/data/{id}', [MenuController::class, 'show'])->name('data');
    Route::get('public/mydata/{id}', [MenuController::class, 'showMyData'])->name('myDataPublic');
    Route::get('private/mydata/{id}', [MenuController::class, 'showMyData'])->name('myDataPrivate');
    Route::delete('/data/{id}', [MenuController::class, 'deleteMenu'])->name('menu.delete');
    Route::put('/data/{id}', [MenuController::class, 'updateMenu'])->name('menu.update');

    // Item
    Route::get('/create-item', [ItemController::class, 'indexView']);
    Route::post('/create-item', [ItemController::class, 'store'])->name('create-item');
});
