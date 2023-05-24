<?php

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




Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');

Route::get('profile', [App\Http\Controllers\Frontend\ProfileController::class, 'profile'])->name('profile');

Route::get('login', [App\Http\Controllers\Frontend\AuthController::class, 'showLoginForm'])->name('user.login.form');

Route::post('login', [App\Http\Controllers\Frontend\AuthController::class, 'login'])->name('user.login');

Route::get('register', [App\Http\Controllers\Frontend\AuthController::class, 'showRegisterForm'])->name('user.register.form');

Route::post('register', [App\Http\Controllers\Frontend\AuthController::class, 'register'])->name('user.register');

Route::post('logout', [App\Http\Controllers\Frontend\AuthController::class, 'logout'])->name('user.logout');

Route::get('profile/room', [App\Http\Controllers\Frontend\RoomController::class, 'index'])->name('user.room');

Route::get('profile/room/create', [App\Http\Controllers\Frontend\RoomController::class, 'create'])->name('user.room.create');



Route::prefix('admin')->group(function () {
	Auth::routes();
	Route::get('/', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('dashboard');

	Route::resource('department', App\Http\Controllers\Backend\DepartmentController::class, ['names'=> 'admin.department']);

	Route::resource('research-area', App\Http\Controllers\Backend\ResearchAreaController::class, ['names'=> 'admin.research-area']);

	Route::resource('topic', App\Http\Controllers\Backend\TopicController::class, ['names'=> 'admin.topic']);
});
