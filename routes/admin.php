<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\ManageRoleController;

// route for admin

// admin
Route::get('/admin_logout_logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::post('/admin_checkLogIn', [AdminController::class, 'checkLogIn'])->name('admin.checklogIn');

Route::get('/login', [AdminController::class, 'login'])->name('admin.login');

// dashboard
Route::get('/dashboard', [DashboardAdminController::class, 'index'])
   ->name('admin.dashboard');

//user
Route::get('/showuser', [ManageUserController::class, 'showuser'])
   ->name('admin.showuser');

Route::get('/create/user', [ManageUserController::class, 'create'])
   ->name('admin.create');

Route::post('/create/user', [ManageUserController::class, 'handle_create'])
   ->name('admin.create.post');

Route::get('/showuser/{id}/del', [ManageUserController::class, 'deluser'])
   ->name('admin.deluser');

Route::get('/showuser/{id}', [ManageUserController::class, 'edituser'])
   ->name('admin.edituser');

Route::post('/showuser/{id}', [ManageUserController::class, 'handle_edit'])
   ->name('admin.handle.edit');

// role
Route::get('/showrole', [ManageRoleController::class, 'showrole'])
   ->name('admin.showrole');

Route::get('/showrole/{id}/del', [ManageRoleController::class, 'delrole'])
   ->name('admin.delrole');

Route::get('/create/role', [ManageRoleController::class, 'create'])
   ->name('admin.createrole');

Route::post('/create/role', [ManageRoleController::class, 'handle_create'])
   ->name('admin.createrole.post');

Route::get('/showrole/{id}', [ManageRoleController::class, 'editrole'])
   ->name('admin.editrole');

Route::post('/showrole/{id}', [ManageRoleController::class, 'handle_edit'])
   ->name('admin.handle.editrole');
