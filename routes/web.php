<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('login/page', function () {
    return view('auth.login');
})->name('login');
Route::get('register/page', function () {
    return view('auth.register');
});
Route::get('dashboard',[UserController::class,'dashboardPage'])->name('dashboard.page');



Route::post('register/save',[UserController::class, 'registerSave'])->name('register.save');
Route::post('login/match',[UserController::class, 'loginSave'])->name('login.match');
Route::get('show',[UserController::class, 'showData'])->name('show.data');
Route::get('inner-page', [UserController::class, 'innerPage'])->name('inner.page');
Route::post('logout', [UserController::class, 'logout'])->name('logout');

// Route::get('login/page',[UserController::class, 'loginPage'])->name('login.page');
