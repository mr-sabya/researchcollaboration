<?php

use App\Models\Room;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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




Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('index');


Auth::routes();

// room
Route::get('research-rooms', [\App\Http\Controllers\Frontend\RoomController::class, 'index'])->name('room.index');
Route::get('research-room/{id}', [\App\Http\Controllers\Frontend\RoomController::class, 'show'])->name('room.show');
Route::get('research-room/request/{id}', [\App\Http\Controllers\Frontend\RoomController::class, 'joinChat'])->name('room.joinchat');
Route::get('research-room/chat/{id}', [\App\Http\Controllers\Frontend\ChatController::class, 'index'])->name('room.chat');

Route::get('topics', [\App\Http\Controllers\Frontend\TopicController::class, 'index'])->name('topic.index');
Route::get('topics/{id}', [\App\Http\Controllers\Frontend\TopicController::class, 'show'])->name('topic.show');


Route::post('search', [\App\Http\Controllers\Frontend\SearchController::class, 'search'])->name('search');

Route::get('discipline/{id}', [\App\Http\Controllers\Frontend\DisciplineController::class, 'show'])->name('discipline.show');

Route::get('members', [\App\Http\Controllers\Frontend\MemberController::class, 'index'])->name('member.index');
Route::get('members/{id}', [\App\Http\Controllers\Frontend\MemberController::class, 'show'])->name('member.show');

Route::get('notifications', [\App\Http\Controllers\NotificationController::class, 'index'])->name('notification.index');
Route::get('notifications/{id}', [\App\Http\Controllers\NotificationController::class, 'show'])->name('notification.show');


Route::prefix('profile')->group(function () {

	Route::get('/', [\App\Http\Controllers\Frontend\Auth\ProfileController::class, 'profile'])->name('profile');

	Route::get('edit', [\App\Http\Controllers\Frontend\Auth\ProfileController::class, 'updateProfilePage'])->name('profile.edit');

	Route::put('update/{id}', [\App\Http\Controllers\Frontend\Auth\ProfileController::class, 'updateProfile'])->name('profile.update');

	Route::get('setting', [\App\Http\Controllers\Frontend\Auth\ProfileController::class, 'setting'])->name('profile.setting');

	// update password
	Route::put('update/password/{id}', [\App\Http\Controllers\Frontend\Auth\ProfileController::class, 'updatePassword'])->name('user.password.update');


	Route::get('edit-image', [\App\Http\Controllers\Frontend\Auth\ProfileController::class, 'profileImage'])->name('profile.image');


	Route::post('edit-image/update', [\App\Http\Controllers\Frontend\Auth\ProfileController::class, 'updateImage'])->name('profile.image.update');

	Route::resource('room', \App\Http\Controllers\Frontend\Auth\RoomController::class, ['names' => 'user.room']);

	// approve room member
	Route::get('room/member/approve/{id}', [\App\Http\Controllers\Frontend\Auth\ChatController::class, 'approveMember'])->name('profile.member.approve');


	Route::post('chat/create', [\App\Http\Controllers\Frontend\Auth\ChatController::class, 'chat'])->name('chat.create');
});





Route::prefix('admin')->middleware('admin')->group(function () {

	Route::get('/', [\App\Http\Controllers\Backend\HomeController::class, 'index'])->name('dashboard');

	Route::get('users', [\App\Http\Controllers\Backend\UserController::class, 'index'])->name('admin.user.index');

	Route::resource('department', \App\Http\Controllers\Backend\DepartmentController::class, ['names' => 'admin.department']);

	Route::resource('research-area', \App\Http\Controllers\Backend\ResearchAreaController::class, ['names' => 'admin.research-area']);

	Route::resource('topic', \App\Http\Controllers\Backend\TopicController::class, ['names' => 'admin.topic']);
});
