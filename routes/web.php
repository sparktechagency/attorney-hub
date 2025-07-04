<?php

use App\Http\Controllers\Admin\ZipController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayPalController;
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
use Illuminate\Routing\RouteRegistrar;

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
Route::get('/search', [HomeController::class, 'searchAttorney'])->name('search.attorney');
Route::get('/filter', [HomeController::class, 'filterAttorney'])->name('filter.attorney');
Route::get('/about', [HomeController::class, 'getAbout'])->name('about');
Route::get('/category/{uuid}', [HomeController::class, 'getCategoryWiseAttorney'])->name('category.wise.attorney');

Route::group(['namespace' => 'AuthControllers'], function () {

    //Route::get('home', [HomeController::class, 'getHome'])->name('home');
    Route::get('login', [LoginController::class, 'getLogin'])->name('get.login');
    Route::post('login', [LoginController::class, 'postLogin'])->name('post.login');

    Route::get('logout', [LogoutController::class, 'getLogout'])->name('get.logout');
    Route::post('logout', [LogoutController::class, 'postLogout'])->name('post.logout');

    Route::get('register', [RegisterController::class, 'getRegister'])->name('get.register');
    Route::post('register', [RegisterController::class, 'postRegister'])->name('post.register');

});

Route::group(['prefix' => 'attorney', 'middleware' => 'authenticated'], function () {
    Route::get('attorneyProfile', [DashboardController::class, 'getAttorneyProfile'])->name('get.attorney.dashboard');
    Route::get('attorneyProfile/edit/{uuid}', [DashboardController::class, 'getAttorneyProfileEdit'])->name('get.attorney.profile.edit');
    Route::get('paypal/payment', [PayPalController::class, 'handlePayment'])->name('make.payment');
    Route::get('paypal/payment/success', [PayPalController::class, 'paymentSuccess'])->name('success.payment');
    Route::get('paypal/payment/cancel', [PayPalController::class, 'paymentCancel'])->name('cancel.payment');
});

Route::group(['prefix' => 'backend', 'middleware' => 'authenticated'], function () {

    Route::get('dashboard', [DashboardController::class, 'getDashboard'])->name('get.dashboard');

    //Zip Code
    Route::get('getZipCode', [ZipController::class, 'getZipCode'])->name('getZipCode');
    Route::post('storeZipCode', [ZipController::class, 'storeZipCode'])->name('storeZipCode');

    //category section
    Route::get('category', [CategoryController::class, 'getCategory'])->name('get.category');
    Route::post('addCategory', [CategoryController::class, 'storeCategory'])->name('storeCategory');


    //Department section
    Route::resource('department', DepartmentController::class);

    //Designation section
    Route::resource('designation', DesignationController::class);

    //Set Office Time
    Route::resource('officeTime',SetOfficeTimeController::class);

    //Leave Section
    Route::resource('leave',LeaveController::class);

});