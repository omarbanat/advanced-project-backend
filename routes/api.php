<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CourseCycleController;
use App\Http\Controllers\EnrollmentController;
use App\Models\CourseCycle;
use App\Models\Enrollment;
use App\Http\Controllers\sectionController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::Post('/announcements/create', [AnnouncementController::class, "addAnnouncement"]);
Route::get('/announcements', [AnnouncementController::class, "showAnnouncement"]);
Route::PUT('/announcements/edit/{id}', [AnnouncementController::class, "editAnnouncement"]);
Route::delete('/announcements/delete/{id}', [AnnouncementController::class, "deleteAnnouncement"]);
Route::get('/announcements/restore/{id}', [AnnouncementController::class, "restoreAnnouncement"]);


Route::Post('/assignments/create', [AssignmentController::class, "addAssignment"]);
Route::get('/assignments', [AssignmentController::class, "showAssignment"]);
Route::PUT('/assignments/edit/{id}', [AssignmentController::class, "editAssignment"]);
Route::delete('/assignments/delete/{id}', [AssignmentController::class, "deleteAssignment"]);
Route::get('/assignments/restore/{id}', [AssignmentController::class, "restoreAssignment"]);


Route::Post('/attendance/add', [AttendanceController::class, 'addAttendance']);
Route::get('/attendance/get', [AttendanceController::class, 'getAttendance']);
Route::PUT('/attendance/edit/{id}', [AttendanceController::class, 'editAttendance']);
Route::delete('/attendance/delete/{id}', [AttendanceController::class, 'deleteAttendance']);
Route::get('/attendance/restore/{id}', [AttendanceController::class, 'restoreAttendance']);

Route::prefix('courses')->group(function () {
    Route::Post('/create', [CourseController::class, 'addCourses']);
    Route::get('/get', [CourseController::class, 'getCourses']);
    Route::PUT('/edit/{id}', [CourseController::class, 'editCourses']);
    Route::delete('/delete/{id}', [CourseController::class, 'deleteCourses']);
    Route::get('/restore/{id}', [CourseController::class, 'restoreCourses']);
});

Route::Post('/classes/create', [ClassController::class, "addclass"]);
Route::get('/classes', [ClassController::class, "showclass"]);
Route::PUT('/classes/edit/{id}', [ClassController::class, "editclass"]);
Route::delete('/classes/delete/{id}', [ClassController::class, "deleteclass"]);
Route::get('/classes/restore/{id}', [ClassController::class, "restoreClass"]);



Route::prefix('user')->group(function () {
    Route::get('/getAll/{role?}', [UserController::class, 'getAllUsers']);
    Route::post('/add', [UserController::class, 'addUser']);
    Route::put('/update/{id}', [UserController::class, 'updateUser']);
    Route::delete('/delete/{id}', [UserController::class, 'deleteUser']);
    Route::get('/restore/{id}', [UserController::class, 'restoreUser']);
});

Route::prefix('enrollment')->group(function () {
    Route::get('/getAll', [EnrollmentController::class, 'getAllEnrollments']);
    Route::get('/getByID/{id}', [EnrollmentController::class, 'getEnrollmentByID']);
    Route::post('/add', [EnrollmentController::class, 'addEnrollment']);
    Route::put('/update/{id}', [EnrollmentController::class, 'updateEnrollment']);
    Route::put('/delete/{id}', [EnrollmentController::class, 'deleteEnrollment']);
});

Route::prefix('courseCycle')->group(function () {
    Route::get('/getAll', [CourseCycleController::class, 'getAllCourseCycles']);
    Route::get('/getByID/{id}', [CourseCycleController::class, 'getCourseCycleByID']);
    Route::post('/add', [CourseCycleController::class, 'addCourseCycle']);
    Route::put('/update/{id}', [CourseCycleController::class, 'updateCourseCycle']);
    Route::put('/delete/{id}', [CourseCycleController::class, 'deleteCourseCycle']);
});
