
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

    Route::get('/departement', App\Livewire\Departement\Index::class)->name('departement.index');
    Route::get('/departement/create', App\Livewire\Departement\Create::class)->name('departement.create');
    Route::get('/departement/edit/{departementId}', App\Livewire\Departement\Edit::class)->name('departement.edit');
    Route::get('/departement/{departementId}', App\Livewire\Departement\Show::class)->name('departement.show');

    Route::get('/user', App\Livewire\Pages\User\Index::class)->name('user.index');
    Route::get('/user/create', App\Livewire\Pages\User\Create::class)->name('user.create');
    Route::get('/user/edit/{userId}', App\Livewire\Pages\User\Edit::class)->name('user.edit');
    Route::get('/user/{userId}', App\Livewire\Pages\User\Show::class)->name('user.show');

    // // role
    Route::get('/role', App\Livewire\Role\Index::class)->name('role.index');
    Route::get('/role/create', App\Livewire\Role\Create::class)->name('role.create');
    Route::get('/role/edit/{roleId}', App\Livewire\Role\Edit::class)->name('role.edit');
    Route::get('/role/{roleId}', App\Livewire\Role\Show::class)->name('role.show');

    Route::get('permissions', App\Livewire\Permission\Index::class)->name('permission.index');
    Route::get('permissions/create', App\Livewire\Permission\Create::class)->name('permission.create');
    Route::get('permissions/show/{id}', App\Livewire\Permission\Show::class)->name('permission.show');
    Route::get('permissions/edit/{permissionId}', App\Livewire\Permission\Edit::class)->name('permission.edit');

    // Bagian
    Route::get('/bagian', App\Livewire\Bagian\Index::class)->name('bagian.index');
    Route::get('/bagian/create', App\Livewire\Bagian\Create::class)->name('bagian.create');
    Route::get('/bagian/edit/{id}', App\Livewire\Bagian\Edit::class)->name('bagian.edit');
    Route::get('/bagian/{id}', App\Livewire\Bagian\Show::class)->name('bagian.show');

    Route::get('/jabatan', App\Livewire\Jabatan\Index::class)->name('jabatan.index');
    Route::get('/jabatan/create', App\Livewire\Jabatan\Create::class)->name('jabatan.create');
    Route::get('/jabatan/edit/{id}', App\Livewire\Jabatan\Edit::class)->name('jabatan.edit');
    Route::get('/jabatan/{id}', App\Livewire\Jabatan\Show::class)->name('jabatan.show');
});

Route::get('/login', \App\Livewire\Auth\Login::class)->name('login');
Route::post('/logout', \App\Http\Controllers\LogoutController::class)->name('logout');
