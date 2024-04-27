<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;


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

//School
Route::get('school/dashboard',[SchoolController::class,'dashboard'])->name('dashboard')->middleware('schoolLogin');
Route::get('school/classes',[SchoolController::class,'classes'])->name('classes')->middleware('schoolLogin');
Route::get('school/subject',[SchoolController::class,'subject'])->name('subject')->middleware('schoolLogin');
Route::get('school/addStudent',[SchoolController::class,'addStudent'])->name('addStudent')->middleware('schoolLogin');
Route::get('school/addMark',[SchoolController::class,'addMark'])->name('addMark')->middleware('schoolLogin');
Route::get('school/allStudent',[SchoolController::class,'allStudent'])->name('allStudent')->middleware('schoolLogin');
Route::get('school/login',[SchoolController::class,'schoolLogin'])->middleware('SchoolAlreadyLogin');
Route::post('school/schoolLogin',[SchoolController::class,'schoolAccess'])->name('schoolAccess')->middleware('SchoolAlreadyLogin');
Route::get('school/schoolLogout',[SchoolController::class,'schoolLogout'])->name('schoolLogout');
Route::post('school/addClass',[SchoolController::class,'addClass'])->name('addClass');
Route::post('school/addSubject',[SchoolController::class,'addSubject'])->name('addSubject');
Route::post('school/studentRegistrer',[SchoolController::class,'studentRegister'])->name('studentRegister');
// Route::post('school/addMark',[SchoolController::class,'addMark'])->name('addMark');
Route::post('school/addMark',[SchoolController::class,'searchStudent'])->name('searchStudent');
Route::post('school/submitResult',[SchoolController::class,'submitResult'])->name('addMarks');

Route::post('school/schoolRegistration',[SchoolController::class,'schoolRegistration'])->name('schoolRegistration');


// admin
Route::get('admin/dashboard',[AdminController::class,'addSchool'])->name('addSchool')->middleware('adminLogin');
Route::get('admin/allSchool',[AdminController::class,'allSchool'])->name('allSchool')->middleware('adminLogin');
Route::get('admin/login',[AdminController::class,'adminlogin'])->middleware('AdminAlreadyLogin');
Route::post('admin/adminLogin',[AdminController::class,'adminAccess'])->name('adminAccess')->middleware('AdminAlreadyLogin');
Route::get('admin/adminLogout',[AdminController::class,'adminLogout'])->name('adminLogout');

//student
Route::get('student/home',[StudentController::class,'home']);
Route::get('student/result',[StudentController::class,'result']);

Route::post('student/home',[StudentController::class,'findResult'])->name('findResult');
