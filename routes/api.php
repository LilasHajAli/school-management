<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('teachers' , [TeacherController::class , 'store']);
Route::post('students' , [StudentController::class , 'store']);
Route::get('teachers' , [TeacherController::class , 'index']);
Route::get('students' , [StudentController::class , 'index']);
Route::get('teachers/{id}/courses' , [TeacherController::class , 'show']);
Route::get('courses/{id}/students' , [StudentController::class , 'show']);
Route::post('teachers/{id}/courses' , [TeacherController::class , 'createMany']);
Route::post('courses/{id}/students/sync', [CourseController::class, 'sync']);
