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
use App\Http\Controllers\Admin\FeesController;
use App\Http\Controllers\Admin\FeeTypeController;
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
    Route::get('/superadmin/view-parent/{parent}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'view_parent'])->name('superadmin.view-parent');
    Route::get('/superadmin/users', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'all_users'])->name('superadmin.users');
    Route::put('/users/edit/{user}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'edit_user_role']);
    Route::get('/superadmin/cars', [App\Http\Controllers\superadmin\SuperAdminController::class, 'cars'])->name('superadmin.cars');
    Route::get('/superadmin/routes', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'routes'])->name('superadmin.routes');
    Route::post('/storeroutes', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'storeroutes']);
    Route::put('/edit/route/{route}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'edit_route']);
    Route::delete('/delete/route/{route}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'delete_route']);
    Route::post('/storecars', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'store_cars']);
    Route::put('/edit/car/{car}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'edit_car']);
    Route::delete('/delete/car/{car}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'delete_car']);
    Route::resource('classes', App\Http\Controllers\SClassController::class)->names([
        'index' => 'classes.index', 
    ]);
    Route::resource('sections', App\Http\Controllers\SectionController::class)->names([
        'index' => 'sections.index', 
    ]);
    Route::get('/superadmin/teachers', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'teachers'])->name('superadmin.teachers');
    Route::get('/superadmin/parents', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'parents'])->name('superadmin.parents');
    Route::get('/superadmin/teachers/edit/{teacher}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'editTeacher'])->name('superadmin.edit-teacher');
    Route::put('/superadmin/teachers/{teacher}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'updateTeacher'])->name('superadmin.update-teacher');
    Route::delete('/superadmin/teachers/destroy/{teacher}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'destroyTeacher'])->name('superadmin.destroy-teacher');
    Route::post('/events', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'store_events']);
    Route::get('/superadmin/read-more/{event}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'view_single_event'])->name('superadmin.read-more');
    Route::post('/superadmin/storeteachers', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'store_teachers'])->name('superadmin.storeteachers');
    Route::get('/superadmin/register-teacher', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'register_teacher'])->name('superadmin.register-teacher');
    Route::get('/teacher/notifications', [App\Http\Controllers\Teacher\TeacherController::class, 'notifications'])->name('teacher.notifications');
    Route::get('/teacher/events', [App\Http\Controllers\Teacher\TeacherController::class, 'events'])->name('teacher.events');
    Route::get('/teacher/students', [App\Http\Controllers\Teacher\TeacherController::class, 'students'])->name('teacher.students');
    Route::get('/teacher/attendance', [App\Http\Controllers\Teacher\TeacherController::class, 'attendance'])->name('teacher.attendance');
    Route::post('/attendances', [App\Http\Controllers\Teacher\TeacherController::class, 'attendance_post']);
    Route::get('/teacher/viw-attendance', [App\Http\Controllers\Teacher\TeacherController::class, 'view_attendance'])->name('teacher.viw-attendance');
    
    
    Route::post('/drivers', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'store_driver']);
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
    Route::post('/schoolfees', [App\Http\Controllers\Parent\ParentController::class, 'post_fees']);
    Route::put('/fees/edit/{fee}', [App\Http\Controllers\Parent\ParentController::class, 'edit_fee']);
    Route::post('/staffs' , [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'store_staffs']);
    Route::delete('/staff/delete/{staff}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'delete_staff']);
    Route::put('/staffs/edit/{staff}', [App\Http\Controllers\SuperAdmin\SuperAdminController::class, 'edit_staff']);
    Route::get('/staff/notifications', [App\Http\Controllers\Staff\StaffController::class, 'notifications'])->name('staff.notifications');
    Route::get('/staff/events', [App\Http\Controllers\Staff\StaffController::class, 'events'])->name('staff.events');
    Route::get('/staff/view-nofication', [App\Http\Controllers\Staff\StaffController::class, 'view_notifications'])->name('staff.view-nofication');
    Route::get('/staff/read-more/{event}', [App\Http\Controllers\Staff\StaffController::class, 'read_more_event'])->name('staff.read-more');
   
    
    
    Route::get('/driver/notifications', [App\Http\Controllers\Driver\DriverController::class, 'notifications'])->name('driver.notifications');
    Route::get('/driver/events', [App\Http\Controllers\Driver\DriverController::class, 'events'])->name('driver.events');
    Route::get('/driver/students', [App\Http\Controllers\Driver\DriverController::class, 'students'])->name('driver.students');
    Route::get('/driver/view-nofication', [App\Http\Controllers\Driver\DriverController::class, 'view_notifications'])->name('driver.view-nofication');
    Route::get('/driver/read-more/{event}', [App\Http\Controllers\Driver\DriverController::class, 'read_more']);

    Route::post('/superadmin/classes', [App\Http\Controllers\SClassController::class, 'store'])->name('classes.store');
    Route::post('/superadmin/sections', [App\Http\Controllers\SectionController::class, 'store'])->name('sections.store');

    Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/parents', [App\Http\Controllers\Admin\AdminController::class, 'parents'])->name('admin.parents');
    Route::get('/admin/register/parent', [App\Http\Controllers\Admin\AdminController::class, 'showParentRegistrationForm'])->name('register.parent');
    Route::post('/admin/register/parent', [App\Http\Controllers\Admin\AdminController::class, 'registerParent'])->name('admin.store-parent');
    
    Route::resource('students', StudentController::class);
    
    Route::get('/admin/teachers', [App\Http\Controllers\Admin\AdminController::class, 'teachers'])->name('admin.teachers');
    Route::get('/admin/staff', [App\Http\Controllers\Admin\AdminController::class, 'staff'])->name('admin.staff');
    Route::get('/admin/students', [App\Http\Controllers\Admin\AdminController::class, 'students'])->name('admin.students');
    Route::get('/admin/drivers', [App\Http\Controllers\Admin\AdminController::class, 'drivers'])->name('admin.drivers');
    Route::get('/admin/events', [App\Http\Controllers\Admin\AdminController::class, 'events'])->name('admin.events');
    Route::get('/admin/notifications', [App\Http\Controllers\Admin\AdminController::class, 'notifications'])->name('admin.notifications');
    
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/get-sections', [AdminController::class, 'getSectionsByClass'])->name('getSectionsByClass');
        Route::get('/regions', [AdminController::class, 'regions']);
        Route::get('/regions/{region}/districts', [AdminController::class, 'getDistricts']);

        Route::get('fees/{fee}/receipt', [FeesController::class, 'receipt'])->name('fees.receipt');

        Route::resource('fee-types', FeeTypeController::class)->except(['show']);
        Route::resource('fees', FeesController::class);

        Route::get('/student-fees/{student}', [FeesController::class, 'showSingle']);
});
    
    Route::get('/admin/view-nofication', [App\Http\Controllers\Admin\AdminController::class, 'view_notifications'])->name('admin.view-nofication');
    Route::get('/admin/register-teacher', [App\Http\Controllers\Admin\AdminController::class, 'register_teacher'])->name('admin.register-teacher');
    Route::get('/admin/parents/{id}/edit', [App\Http\Controllers\Admin\AdminController::class, 'editParent'])->name('admin.edit-parent');
    Route::delete('/admin/parents/{id}', [App\Http\Controllers\Admin\AdminController::class, 'destroyParent'])->name('admin.destroy-parent');
    Route::put('/admin/parents/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updateParent'])->name('admin.update-parent');
    Route::post('/admin/storeteachers', [App\Http\Controllers\Admin\AdminController::class, 'store_teachers'])->name('admin.storeteachers');
    Route::get('/admin/teachers/edit/{teacher}', [App\Http\Controllers\Admin\AdminController::class, 'editTeacher'])->name('admin.edit-teacher');
    Route::put('/admin/teachers/{teacher}', [App\Http\Controllers\Admin\AdminController::class, 'updateTeacher'])->name('admin.update-teacher');
    Route::get('/admin/read-more/{event}', [App\Http\Controllers\Admin\AdminController::class, 'view_single_event'])->name('admin.read-more');
    Route::post('/drivers', [App\Http\Controllers\Admin\AdminController::class, 'store_driver']);
    Route::patch('/admin/verify-parent/{id}', [App\Http\Controllers\Admin\AdminController::class, 'verifyParent'])->name('admin.verify-parent');
    Route::delete('/admin/teachers/destroy/{teacher}', [App\Http\Controllers\Admin\AdminController::class, 'destroyTeacher'])->name('admin.destroy-teacher');
    Route::get('/admin/register-staff', [App\Http\Controllers\Admin\AdminController::class, 'register_staff'])->name('admin.register-staff');
    Route::post('/admin/storestaff', [App\Http\Controllers\Admin\AdminController::class, 'store_staff'])->name('admin.storestaff');
    
   
    Route::delete('/staff/delete/{staff}', [App\Http\Controllers\Admin\AdminController::class, 'delete_staff']);
    Route::put('/staffs/edit/{staff}', [App\Http\Controllers\Admin\AdminController::class, 'edit_staff']);
    Route::get('/admin/cars', [App\Http\Controllers\Admin\AdminController::class, 'cars'])->name('admin.cars');
    Route::get('/admin/routes', [App\Http\Controllers\Admin\AdminController::class, 'routes'])->name('admin.routes');
    Route::get('/admin/teachers-activities/{teacher}', [App\Http\Controllers\Admin\AdminController::class, 'teacher_activities'])->name('admin.teachers-activities');

    Route::get('/admin/profile', [App\Http\Controllers\Admin\AdminController::class, 'showProfile'])->name('admin.profile');
    Route::post('/admin/profile/update', [App\Http\Controllers\Admin\AdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::get('/admin/settings', [App\Http\Controllers\Admin\AdminController::class, 'showSettings'])->name('admin.settings');
    Route::post('/admin/settings/update', [App\Http\Controllers\Admin\AdminController::class, 'updateSettings'])->name('admin.settings.update');



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
    Route::put('//edit/activity/{activity_edit', [App\Http\Controllers\Teacher\TeacherController::class, 'edit_post_activity']);
    Route::get('/teacher/parents', [App\Http\Controllers\Teacher\TeacherController::class, 'parents'])->name('teacher.parents');
    Route::get('/teacher/drivers', [App\Http\Controllers\Teacher\TeacherController::class, 'drivers'])->name('teacher.drivers');
    Route::get('/teacher/my_activities', [App\Http\Controllers\Teacher\TeacherController::class, 'my_activities'])->name('teacher.my_activities');
    Route::post('/add/tasks', [App\Http\Controllers\Teacher\TeacherController::class, 'store_tasks'])->name('add.tasks');

    Route::get('/manager/parents', [App\Http\Controllers\Manager\ManagerController::class, 'parents'])->name('manager.parents');
    Route::get('/manager/teachers', [App\Http\Controllers\Manager\ManagerController::class, 'teachers'])->name('manager.teachers');
    Route::get('/manager/staff', [App\Http\Controllers\Manager\ManagerController::class, 'staff'])->name('manager.staff');
    Route::get('/manager/students', [App\Http\Controllers\Manager\ManagerController::class, 'students'])->name('manager.students');
    Route::get('/manager/drivers', [App\Http\Controllers\Manager\ManagerController::class, 'drivers'])->name('manager.drivers');
    Route::get('/manager/events', [App\Http\Controllers\Manager\ManagerController::class, 'events'])->name('manager.events');
    Route::get('/manager/notifications', [App\Http\Controllers\Manager\ManagerController::class, 'notifications'])->name('manager.notifications');
    Route::get('/manager/fees', [App\Http\Controllers\Manager\ManagerController::class, 'fees'])->name('manager.fees');
    Route::get('/manager/view-nofication', [App\Http\Controllers\Manager\ManagerController::class, 'view_notofications'])->name('manager.view-nofication');
    Route::get('/manager/register-teacher', [App\Http\Controllers\Manager\ManagerController::class, 'register_teacher'])->name('manager.register-teacher');
    Route::get('/manager/teachers-edit/{teacher}', [App\Http\Controllers\Manager\ManagerController::class, 'edit_teacher'])->name('manager.teachers-edit');
    Route::delete('/manager/teachers/destroy/{teacher}', [App\Http\Controllers\Manager\ManagerController::class, 'delete_teacher']);
    Route::put('/manager.update-teacher/{teacher}', [App\Http\Controllers\Manager\ManagerController::class, 'update_teacher'])->name('manager.update-teacher');
    Route::get('/manager/view-nofication', [App\Http\Controllers\Manager\ManagerController::class, 'view_notifications'])->name('manager.view-nofication');
    Route::post('/storeDrivers', [App\Http\Controllers\Manager\ManagerController::class, 'store_drivers']);
    Route::put('/drivers/edit/{driver}', [App\Http\Controllers\Manager\ManagerController::class, 'update_driver']);


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
