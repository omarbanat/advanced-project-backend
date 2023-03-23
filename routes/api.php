<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AssignmentSubmissionController;

use App\Http\Controllers\ClassController;
use App\Http\Controllers\CourseCycleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\sectionController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AuthController;
use App\Models\announcements;
use App\Models\assignments;
use App\Models\assignmentSubmissions;
use App\Models\attendance;
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

use App\Models\User;
use App\Models\classModel;
use App\Models\Section;
use App\Models\courses;
use App\Models\CourseCycle;
use App\Models\Enrollment;





Route::get('omar', function () {
    // $res = User::factory()->count(50)->create();
    // $res = classModel::factory()->count(10)->create();
    // $res = Section::factory()->count(5)->create();
    // $res = courses::factory()->count(10)->create();
    // $res = CourseCycle::factory()->count(10)->create();
    // $res = Enrollment::factory()->count(20)->create();
    // $res = assignments::factory()->count(10)->make();
    // $res = assignmentSubmissions::factory()->count(10)->make();
    // $res = announcements::factory()->count(10)->make();

    $res = attendance::factory()->count(10)->make();
    return $res;
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::Post('/announcements/create', [AnnouncementController::class, "addAnnouncement"]);
Route::get('/announcements/get', [AnnouncementController::class, "showAnnouncement"]);
// Route::get('/announcements/getById/{id}', [AnnouncementController::class, "showAnnouncement"]);
Route::PUT('/announcements/edit/{id}', [AnnouncementController::class, "editAnnouncement"]);
Route::delete('/announcements/delete/{id}', [AnnouncementController::class, "deleteAnnouncement"]);
Route::get('/announcements/restore/{id}', [AnnouncementController::class, "restoreAnnouncement"]);



Route::Post('/sections/add', [sectionController::class, "addSection"]);
Route::get('/sections/get', [sectionController::class, "showSection"]);
Route::PUT('/sections/edit/{id}', [sectionController::class, "editSection"]);
Route::delete('/sections/delete/{id}', [sectionController::class, "deleteSection"]);
Route::get('/sections/restore/{id}', [sectionController::class, "restoreSection"]);


Route::Post('/assignmentsSubmission/add', [AssignmentSubmissionController::class, "addAssignmentSubmission"]);
Route::get('/assignmentsSubmission/get', [AssignmentSubmissionController::class, "showAssignmentSubmission"]);



Route::Post('/assignments/add', [AssignmentController::class, "addAssignment"]);
Route::get('/assignments/get', [AssignmentController::class, "showAssignment"]);
Route::PUT('/assignments/edit/{id}', [AssignmentController::class, "editAssignment"]);
Route::delete('/assignments/delete/{id}', [AssignmentController::class, "deleteAssignment"]);
Route::get('/assignments/restore/{id}', [AssignmentController::class, "restoreAssignment"]);


Route::Post('/attendance/add', [AttendanceController::class, 'addAttendance']);
Route::PUT('/attendance/edit/{id}', [AttendanceController::class, 'editAttendance']);
Route::delete('/attendance/delete/{id}', [AttendanceController::class, 'deleteAttendance']);
Route::get('/attendance/restore/{id}', [AttendanceController::class, 'restoreAttendance']);

Route::prefix('courses')->group(function () {
    Route::Post('/add', [CourseController::class, 'addCourses']);
    Route::get('/get', [CourseController::class, 'getCourses']);
    Route::PUT('/edit/{id}', [CourseController::class, 'editCourses']);
    Route::delete('/delete/{id}', [CourseController::class, 'deleteCourses']);
    Route::get('/restore/{id}', [CourseController::class, 'restoreCourses']);
});

Route::Post('/classes/add', [ClassController::class, "addclass"]);
Route::get('/classesget', [ClassController::class, "showclass"]);
Route::PUT('/classes/edit/{id}', [ClassController::class, "editclass"]);
Route::delete('/classes/delete/{id}', [ClassController::class, "deleteclass"]);
Route::get('/classes/restore/{id}', [ClassController::class, "restoreClass"]);



Route::prefix('user')->group(function () {
    Route::get('/getAll/{role?}', [UserController::class, 'getAllUsers']);
    Route::post('/add', [UserController::class, 'addUser']);
    Route::put('/update/{id}', [UserController::class, 'updateUser']);
    Route::get('/restore/{id}', [UserController::class, 'restoreUser']);
    Route::delete('/delete/{id}', [UserController::class, 'deleteUser']);
});

Route::prefix('enrollment')->group(function () {
    Route::get('/get', [EnrollmentController::class, 'getAllEnrollments']);
    Route::get('/getByID/{id}', [EnrollmentController::class, 'getEnrollmentByID']);
    Route::post('/add', [EnrollmentController::class, 'addEnrollment']);
    Route::put('/edit/{id}', [EnrollmentController::class, 'updateEnrollment']);
    Route::delete('/delete/{id}', [EnrollmentController::class, 'deleteEnrollment']);
    Route::get('/restore/{id}', [EnrollmentController::class, 'restoreEnrollment']);
});

Route::prefix('courseCycle')->group(function () {
    Route::get('/get', [CourseCycleController::class, 'getAllCourseCycles']);
    Route::get('/getByID/{id}', [CourseCycleController::class, 'getCourseCycleByID']);
    Route::post('/add', [CourseCycleController::class, 'addCourseCycle']);
    Route::put('/edit/{id}', [CourseCycleController::class, 'updateCourseCycle']);
    Route::delete('/delete/{id}', [CourseCycleController::class, 'deleteCourseCycle']);
    Route::get('/restore/{id}', [CourseCycleController::class, 'restoreCourseCycle']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [UserController::class, 'login']);

Route::post('/register', [UserController::class, 'addUser']);
// protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/courseCycle/getAll', [CourseCycleController::class, 'getAllCourseCycles']);
    Route::get('/products/search/{name}', [productController::class, 'search']);
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/enrollment/getAll', [EnrollmentController::class, 'getAllEnrollments']);
});

Route::get('getAttendancesByCourseID/{id}', [AttendanceController::class, 'getAttendancesByCourseID']);
