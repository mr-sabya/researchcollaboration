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




Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('index');



Route::get('login', [App\Http\Controllers\Frontend\AuthController::class, 'showLoginForm'])->name('user.login.form');

Route::post('login', [App\Http\Controllers\Frontend\AuthController::class, 'login'])->name('user.login');

Route::get('register', [App\Http\Controllers\Frontend\AuthController::class, 'showRegisterForm'])->name('user.register.form');

Route::post('register', [App\Http\Controllers\Frontend\AuthController::class, 'register'])->name('user.register');

Route::post('logout', [App\Http\Controllers\Frontend\AuthController::class, 'logout'])->name('user.logout');


Route::get('profile', [App\Http\Controllers\Frontend\ProfileController::class, 'profile'])->name('profile');

Route::get('profile/edit', [App\Http\Controllers\Frontend\ProfileController::class, 'updateProfilePage'])->name('profile.edit');

Route::put('profile/update/{id}', [App\Http\Controllers\Frontend\ProfileController::class, 'updateProfile'])->name('profile.update');

Route::get('profile/setting', [App\Http\Controllers\Frontend\ProfileController::class, 'setting'])->name('profile.setting');

// update password
Route::put('update/password/{id}', [App\Http\Controllers\Frontend\ProfileController::class, 'updatePassword'])->name('user.password.update');


Route::get('profile/edit-image', [App\Http\Controllers\Frontend\ProfileController::class, 'profileImage'])->name('profile.image');


Route::post('profile/edit-image/update', [App\Http\Controllers\Frontend\ProfileController::class, 'updateImage'])->name('profile.image.update');

// user room

Route::get('profile/room', [App\Http\Controllers\Frontend\RoomController::class, 'index'])->name('user.room');

Route::get('profile/room/create', [App\Http\Controllers\Frontend\RoomController::class, 'create'])->name('user.room.create');

Route::post('profile/room/store', [App\Http\Controllers\Frontend\RoomController::class, 'store'])->name('user.room.store');

Route::get('profile/room/{id}', [App\Http\Controllers\Frontend\RoomController::class, 'edit'])->name('user.room.edit');

Route::put('profile/room/update/{id}', [App\Http\Controllers\Frontend\RoomController::class, 'update'])->name('user.room.update');



Route::prefix('admin')->group(function () {
	Auth::routes();
	Route::get('/', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('dashboard');

	Route::resource('department', App\Http\Controllers\Backend\DepartmentController::class, ['names'=> 'admin.department']);

	Route::resource('research-area', App\Http\Controllers\Backend\ResearchAreaController::class, ['names'=> 'admin.research-area']);

	Route::resource('topic', App\Http\Controllers\Backend\TopicController::class, ['names'=> 'admin.topic']);
});
