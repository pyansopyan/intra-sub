<?php

use App\Livewire\Welcome;
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

Route::middleware('auth') -> group(function () {
    Route::get('/', Welcome::class)->name('welcome');

    Route::get('/user', App\Livewire\Pages\User\Index::class)->name('user.index');
    Route::get('/user/create', App\Livewire\Pages\User\Create::class)->name('user.create');
    Route::get('/user/{id}', App\Livewire\Pages\User\Edit::class)->name('user.edit');
});

Route::get('/login', \App\Livewire\Auth\Login::class)->name('login');
Route::post('/logout', \App\Http\Controllers\LogoutController::class)->name('logout');

