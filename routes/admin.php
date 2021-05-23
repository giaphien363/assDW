<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\ManageRoleController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\RoleObjectController;


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

// role-user
Route::get('/showrole_user', [RoleUserController::class, 'showrole_user'])
   ->name('admin.showrole.user');

Route::get('/showrole_user/{id}/del', [RoleUserController::class, 'delrole_user'])
   ->name('admin.delrole.user');

Route::get('/create/role-user', [RoleUserController::class, 'create'])
   ->name('admin.createrole.user');

Route::post('/create/role-user', [RoleUserController::class, 'handle_create'])
   ->name('admin.createrole.user.post');

Route::get('/showrole-user/{id}', [RoleUserController::class, 'editrole_user'])
   ->name('admin.editrole.user');

Route::post('/showrole-user/{id}', [RoleUserController::class, 'handle_edit'])
   ->name('admin.handle.editrole.user');

//Object
Route::get('/showobject', [ObjectController::class, 'index'])
   ->name('admin.showobject');

Route::get('/create/object', [ObjectController::class, 'create'])
   ->name('admin.createobject');

Route::post('/create/object', [ObjectController::class, 'handle_create'])
   ->name('admin.createobject.post');

Route::get('/showobject/{id}', [ObjectController::class, 'editobject'])
   ->name('admin.editobject');

Route::post('/showobject/{id}', [ObjectController::class, 'handle_edit'])
   ->name('admin.handle.editobject');

Route::get('/showobject/{id}/del', [ObjectController::class, 'delobject'])
   ->name('admin.delobject');


// role Object
Route::get('/showroleobject', [RoleObjectController::class, 'index'])
   ->name('admin.showroleobject');

Route::get('/create/role/object', [RoleObjectController::class, 'create'])
   ->name('admin.createrole.object');

Route::post('/create/role/object', [RoleObjectController::class, 'handle_create'])
   ->name('admin.createrole.object.post');

Route::get('/showrole/object/{id}', [RoleObjectController::class, 'edit'])
   ->name('admin.editrole.object');

Route::post('/showrole/object/{id}', [RoleObjectController::class, 'handle_edit'])
   ->name('admin.handle.editrole.object');

Route::get('/showrole/object/{id}/del', [RoleObjectController::class, 'delrole_object'])
   ->name('admin.delrole.object');
