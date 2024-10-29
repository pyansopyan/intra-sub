
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

    //edit profile user
    Route::get('/profile/edit', App\Livewire\Pages\User\Editprofile::class)->name('profile.edit');

    // //Change Password
    Route::get('/changepassword', App\Livewire\Pages\User\ChangePassword::class)->name('change.password');

    //task status
    Route::get('/task-status', App\Livewire\TaskStatus\Index::class)->name('task-status.index');
    Route::get('/task-status/create', App\Livewire\TaskStatus\Create::class)->name('task-status.create');
    Route::get('/task-status/edit/{taskStatusId}', App\Livewire\TaskStatus\Edit::class)->name('task-status.edit');
    Route::get('/task-status/{taskStatusId}', App\Livewire\TaskStatus\Show::class)->name('task-status.show');

    // task type
    Route::get('/task-type', App\Livewire\TaskType\Index::class)->name('task-type.index');
    Route::get('/task-type/create', App\Livewire\TaskType\Create::class)->name('task-type.create');
    Route::get('/task-type/edit/{taskTypeId}', App\Livewire\TaskType\Edit::class)->name('task-type.edit');
    Route::get('/task-type/{taskTypeId}', App\Livewire\TaskType\Show::class)->name('task-type.show');

    // Project Statuses
    Route::get('/statuses', App\Livewire\ProjectStatuses\Index::class)->name('project-statuses.index');
    Route::get('/statuses/create', App\Livewire\ProjectStatuses\Create::class)->name('project-statuses.create');
    Route::get('/statuses/edit/{statusId}', App\Livewire\ProjectStatuses\Edit::class)->name('project-statuses.edit');
    Route::get('/statuses/{statusId}', App\Livewire\ProjectStatuses\Show::class)->name('project-statuses.show');

    // Project priorities
    Route::get('/priorities', App\Livewire\Priorities\Index::class)->name('priorities.index');
    Route::get('/priorities/create', App\Livewire\Priorities\Create::class)->name('priorities.create');
    Route::get('/priorities/edit/{prioritasId}', App\Livewire\Priorities\Edit::class)->name('priorities.edit');
    Route::get('/priorities/{prioritasId}', App\Livewire\Priorities\Show::class)->name('priorities.show');


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
