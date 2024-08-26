<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Parent\ParentController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Driver\DriverController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\SClassController;
use App\Http\Controllers\SectionController;
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
Route::get('/get-students', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'getStudentsByClassSection'])->name('get.students');

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
    Route::resource('classes', App\Http\Controllers\SClassController::class)->names([
        'index' => 'classes.index', 
    ]);
    Route::resource('sections', App\Http\Controllers\SectionController::class)->names([
        'index' => 'sections.index', 
    ]);
    Route::get('/superadmin/teachers', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'teachers'])->name('superadmin.teachers');
    Route::get('/superadmin/parents', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'parents'])->name('superadmin.parents');
    Route::get('/superadmin/teachers/edit/{teacher}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'editTeacher'])->name('superadmin.edit-teacher');
    Route::put('/superadmin/teachers/{id}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'updateTeacher'])->name('superadmin.update-teacher');
    Route::delete('/superadmin/teachers/destroy/{teacher}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'destroyTeacher'])->name('superadmin.destroy-teacher');
    Route::post('/events', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'store_events']);
    Route::get('/superadmin/read-more/{event}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'view_single_event'])->name('superadmin.read-more');
    Route::post('/superadmin/storeteachers', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'store_teachers'])->name('superadmin.storeteachers');
    Route::get('/superadmin/register-teacher', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'register_teacher'])->name('superadmin.register-teacher');
    Route::get('/teacher/notifications', [App\Http\Controllers\Teacher\TeacherController::class, 'notifications'])->name('teacher.notifications');
    Route::get('/teacher/events', [App\Http\Controllers\Teacher\TeacherController::class, 'events'])->name('teacher.events');
    Route::get('/teacher/students', [App\Http\Controllers\Teacher\TeacherController::class, 'students'])->name('teacher.students');
    
    
    Route::get('/superadmin/staff', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'staff'])->name('superadmin.staff');
    Route::get('/superadmin/students', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'students'])->name('superadmin.students');
    Route::resource('students', App\Http\Controllers\StudentController::class);
    Route::get('/superadmin/drivers', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'drivers'])->name('superadmin.drivers');
    Route::get('/superadmin/events', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'events'])->name('superadmin.events');
    Route::get('/superadmin/notifications', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'notifications'])->name('superadmin.notifications');
    Route::get('/superadmin/fees', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'fees'])->name('superadmin.fees');
    Route::post('/notifications', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'store_notifications']);
    Route::get('/superadmin/view-nofication', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'view_notifications'])->name('superadmin.view-nofication');
    Route::get('/parent/drivers', [App\Http\Controllers\Parent\ParentController::class, 'driver'])->name('parent.drivers');
    Route::get('/parent/fees', [App\Http\Controllers\Parent\ParentController::class, 'fees'])->name('parent.fees');
    Route::get('/parent/events', [App\Http\Controllers\Parent\ParentController::class, 'events'])->name('parent.events');
    Route::get('/parent/notifications', [App\Http\Controllers\Parent\ParentController::class, 'notifications'])->name('parent.notifications');
    Route::get('/parent/messages', [App\Http\Controllers\Parent\ParentController::class, 'parent_message'])->name('parent.messages');

    // Routes for fees
    Route::resource('fees', FeesController::class);
    // Routes for adding classes and sections
    Route::post('/superadmin/classes', [App\Http\Controllers\SClassController::class, 'store'])->name('classes.store');
    Route::post('/superadmin/sections', [App\Http\Controllers\SectionController::class, 'store'])->name('sections.store');

    Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/manager', [App\Http\Controllers\Manager\ManagerController::class, 'dashboard'])->name('manager.dashboard');
    Route::get('/parent', [App\Http\Controllers\Parent\ParentController::class, 'dashboard'])->name('parent.dashboard');
    Route::get('/teacher', [App\Http\Controllers\Teacher\TeacherController::class, 'dashboard'])->name('teacher.dashboard');
    Route::get('/driver', [App\Http\Controllers\Driver\DriverController::class, 'dashboard'])->name('driver.dashboard');
    Route::get('/staff', [App\Http\Controllers\Staff\StaffController::class, 'dashboard'])->name('staff.dashboard');
    Route::get('/activity', [App\http\Controllers\Teacher\TeacherController::class, 'student_activities'])->name('teacher.activity');
    Route::get('/add-activity/{student}', [App\Http\Controllers\Teacher\TeacherController::class, 'load_to_add_activities'])->name('teacher.add-activity');
    Route::post('/storeactivities', [App\Http\Controllers\Teacher\TeacherController::class, 'store_activities']);
    Route::get('/superadmin/register-student', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'register_student']);
    Route::post('/storestudents', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'store_students']);
    Route::get('/my-child/{student}', [App\Http\Controllers\Parent\ParentController::class, 'child_activity'])->name('parent.my-child');
    Route::get('/teacher/edit-activity/{activity}', [App\Http\Controllers\Teacher\TeacherController::class, 'edit_activity'])->name('teacher.edit-activity');
    Route::get('/teacher/view-activity/{activity}', [App\Http\Controllers\Teacher\TeacherController::class, 'view_activity'])->name('teacher.view-activity');
    Route::get('/teacher/message', [App\Http\Controllers\Teacher\TeacherController::class, 'notify'])->name('teacher.message');
    Route::post('/messages', [App\Http\Controllers\Teacher\TeacherController::class, 'store_messages']);
    Route::get('/teacher/view-message', [App\Http\Controllers\Teacher\TeacherController::class, 'view_messages'])->name('teacher.view-message');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
