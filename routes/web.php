<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Parent\ParentController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Driver\DriverController;
use App\Http\Controllers\Staff\StaffController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    // Route::get('/api/districts-by-region', [App\Http\Controllers\ApiController::class, 'getDistrictsByRegion'])->name('api.districts.by.region');
    Route::get('/superadmin', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
    Route::get('/superadmin/register/parent', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'showParentRegistrationForm'])->name('register.parent');
    Route::post('/superadmin/register/parent', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'registerParent'])->name('superadmin.store-parent');
    Route::get('/superadmin/parents', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'parents'])->name('superadmin.parents');
    Route::get('/superadmin/parents/{id}/edit', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'editParent'])->name('superadmin.edit-parent');
    Route::put('/superadmin/parents/{id}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'updateParent'])->name('superadmin.update-parent');
    Route::delete('/superadmin/parents/{id}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'destroyParent'])->name('superadmin.destroy-parent');
    Route::patch('/superadmin/verify-parent/{id}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'verifyParent'])->name('superadmin.verify-parent');

    Route::get('/superadmin/teachers', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'teachers'])->name('superadmin.teachers');
    // Route::get('/superadmin/teachers', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'parents'])->name('superadmin.parents');
    Route::get('/superadmin/teachers/{id}/edit', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'editTeacher'])->name('superadmin.edit-teacher');
    Route::put('/superadmin/teachers/{id}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'updateTeacher'])->name('superadmin.update-teacher');
    Route::delete('/superadmin/teachers/{id}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'destroyTeacher'])->name('superadmin.destroy-teacher');
    
    
    Route::get('/superadmin/staff', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'staff'])->name('superadmin.staff');
    Route::get('/superadmin/students', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'students'])->name('superadmin.students');
    Route::resource('students', App\Http\Controllers\StudentController::class);
    Route::get('/superadmin/drivers', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'drivers'])->name('superadmin.drivers');
    Route::get('/superadmin/events', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'events'])->name('superadmin.events');
    Route::get('/superadmin/notifications', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'notifications'])->name('superadmin.notifications');
    Route::get('/superadmin/fees', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'fees'])->name('superadmin.fees');


    // Routes for adding classes and sections
    Route::post('/superadmin/classes', [App\Http\Controllers\SClassController::class, 'store'])->name('classes.store');
    Route::post('/superadmin/sections', [App\Http\Controllers\SectionController::class, 'store'])->name('sections.store');

    Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/manager', [App\Http\Controllers\Manager\ManagerController::class, 'dashboard'])->name('manager.dashboard');
    Route::get('/parent', [App\Http\Controllers\Parent\ParentController::class, 'dashboard'])->name('parent.dashboard');
    Route::get('/teacher', [App\Http\Controllers\Teacher\TeacherController::class, 'dashboard'])->name('teacher.dashboard');
    Route::get('/driver', [App\Http\Controllers\Driver\DriverController::class, 'dashboard'])->name('driver.dashboard');
    Route::get('/staff', [App\Http\Controllers\Staff\StaffController::class, 'dashboard'])->name('staff.dashboard');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
