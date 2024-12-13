<?php

use App\Livewire\Report\Form;
use App\Http\Controllers\pages\Page2;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\ACL\RoleController;
use App\Http\Controllers\ACL\UserRoleController;
use App\Http\Controllers\ACL\PermissionController;
use App\Http\Controllers\Report\TrackingController;
use App\Livewire\ReportType\Form as ReportTypeForm;
use App\Livewire\ReportType\View as ReportTypeView;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\authentications\RegisterBasic;

// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

  Route::get('/dashboard', function () {
    return view('/');
  })->name('dashboard');

  // Main Page Route
  Route::get('/', [HomePage::class, 'index'])->name('pages-home');
  Route::get('/page-2', [Page2::class, 'index'])->name('pages-page-2');

  // locale
  Route::get('/lang/{locale}', [LanguageController::class, 'swap']);
  Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');

  Route::get('/reportType', ReportTypeView::class)->name('reportTypeView');
  Route::get('/reportType/{id?}', ReportTypeForm::class)->name('reportTypeForm');

  Route::get('/report/{type?}', Form::class)->name('reportForm');
});


Route::middleware(['auth'])->prefix('acl')->name('acl.')->group(function () {
  // Roles
  Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');

  // Permissions
  Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');

  // User Roles
  Route::get('/user-roles', [UserRoleController::class, 'index'])->name('user-roles.index');
});


Route::get('/consultar-protocolo', [TrackingController::class, 'index'])->name('report.tracking');
