<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::Post('/attendance/add',[AttendanceController::class,'addAttendance']);

Route::get('/attendance/get', [AttendanceController::class, 'getAttendance']);
