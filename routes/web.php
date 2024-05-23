<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes([
    'register' => false
]);

Route::get('/home', function (){
    return 'nothing';
})->middleware(['redirect'])->name('home');

Route::group(['prefix'=>'admin','middleware'=>['auth','adminAuth']],function (){
Route::get('dashboard',[\App\Http\Controllers\AdminController::class,'index'])->name('admin.index');
    // Resources
    Route::resource('todo',\App\Http\Controllers\TodoController::class);
    Route::resource('course',\App\Http\Controllers\CourseController::class);
    Route::resource('teacher',\App\Http\Controllers\AdminTeacherController::class);
    Route::resource('subject',\App\Http\Controllers\SubjectController::class);
    Route::resource('student',\App\Http\Controllers\StudentController::class);

    //Simple Get Requests
    Route::match(['GET','POST','DELETE'],'setting',[\App\Http\Controllers\SettingContoller::class,'index'])->name('setting.index');
    Route::get('report',[\App\Http\Controllers\ReportController::class,'index'])->name('report.index');
});

Route::group(['prefix'=>'teacher','middleware'=>['auth','teacherAuth']],function (){
   Route::get('dashboard',[\App\Http\Controllers\TeacherController::class,'index'])->name('teacher.dashboard');
   Route::post('save/student/attendance',[\App\Http\Controllers\TeacherController::class,'save_attendance'])->name('save.attendance');
});
