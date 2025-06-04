<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllers\{
    ForgotPasswordController,
    LoginController,
    LogoutController,
    RegisterController,
    ResetPasswordController,
};
use App\Http\Controllers\BackendControllers\{

    DashboardController,
    EmployeeController,
    DepartmentController,
    DesignationController,
    DisciplinaryController,
    SetOfficeTimeController,
    DailyAttendenceController,
    ReportController,
    LeaveController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'getHome'])->name('home');

Route::group(['namespace' => 'AuthControllers'], function () {
    Route::get('login', [LoginController::class, 'getLogin'])->name('get.login');
    Route::post('login', [LoginController::class, 'postLogin'])->name('post.login');

    Route::get('logout', [LogoutController::class, 'getLogout'])->name('get.logout');
    Route::post('logout', [LogoutController::class, 'postLogout'])->name('post.logout');

    Route::get('register', [RegisterController::class, 'getRegister'])->name('get.register');
    Route::post('register', [RegisterController::class, 'postRegister'])->name('post.register');

    Route::get('forgot-password', [ForgotPasswordController::class, 'getForgotPassword'])->name('get.forgot.password');
    Route::post('forgot-password', [ForgotPasswordController::class, 'postForgotPassword'])->name('post.forgot.password');

    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'getResetPassword'])->name('get.reset.password');
    Route::post('reset-password', [ForgotPasswordController::class, 'postResetPassword'])->name('post.reset.password');
});


Route::group(['prefix' => 'backend', 'middleware' => 'authenticated'], function () {

    Route::get('dashboard', [DashboardController::class, 'getDashboard'])->name('get.dashboard');

    //employee section
    Route::resource('employee', EmployeeController::class);
    Route::get('employee/list',[EmployeeController::class, 'employee_list'])->name('employee.list');

    //Department section
    Route::resource('department', DepartmentController::class);

    //Designation section
    Route::resource('designation', DesignationController::class);

    //Disciplinary Section
    Route::resource('disciplinary', DisciplinaryController::class);
    Route::get('discipline/employee/list', [DisciplinaryController::class,'employee_list'])->name('discipline.employee.list');
    Route::post('taken/disciplinary/action', [DisciplinaryController::class,'disciplinary_action'])->name('take.disciplinary.action');
    Route::get('punished/employee/list', [DisciplinaryController::class,'punishedEmployeeList'])->name('punished.employee.list');
    Route::get('show/punished/employee/list', [DisciplinaryController::class,'showPunishedEmployeeList'])->name('show.punished.employee.list');

    //Set Office Time
    Route::resource('officeTime',SetOfficeTimeController::class);

    //Attendence Section
    Route::resource('dailyAttendance',DailyAttendenceController::class);
    Route::post('clockIn/daily',[DailyAttendenceController::class,'clockInAttendance'])->name('clockIn.dashboard');
    Route::post('clockOut/daily',[DailyAttendenceController::class,'clockOutAttendance'])->name('clockOut.dashboard');


    //Report Section
    Route::resource('report',ReportController::class);
    // Route::post('/get-attendaceReport-pdf', [ReportController::class, 'generatePdf'])->name('attendance.pdf');
    Route::post('/get-attendanceReport-pdf', [ReportController::class, 'generatePdf'])->name('attendance.pdf');

    //Leave Section
    Route::resource('leave',LeaveController::class);

});