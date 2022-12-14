<?php

use App\Http\Controllers\Backend\BackupController;
use App\Http\Controllers\Backend\BashicController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/




Route::get('/dashboard',[DashboardController::class,'__invoke'])->name('dashboard');
Route::get('role/delete/{id}',[BashicController::class,'deleteRole'])->name('role.delete');
Route::get('user/delete/{id}',[BashicController::class,'deleteUser'])->name('user.delete');

Route::resource('role',RoleController::class);
Route::resource('user',UserController::class);

Route::resource('backups',BackupController::class)->only(['index','store','destroy']);
//Route::get('backup/{file_name}',BackupController::class,'Download')->name('download');
Route::get('backups/delete/{id}',[BashicController::class,'deleteBackup'])->name('backups.delete');

//Profile Routes
Route::get('profile/view',[ProfileController::class,'index'])->name('profile.view');
Route::get('profile/edit',[ProfileController::class,'editProfile'])->name('profile.edit');
Route::post('profile/update',[ProfileController::class,'updateProfile'])->name('profile.update');
Route::get('profile/password/change',[ProfileController::class,'passwordChange'])->name('profile.changePassword');
Route::post('profile/password/update',[ProfileController::class,'PasswordUpdate'])->name('profile.updatePassword');

//Pages
Route::resource('Page',PageController::class);
Route::get('page/delete/{id}',[BashicController::class,'DeletePage'])->name('page.destroy');
