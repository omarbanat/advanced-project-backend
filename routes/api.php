<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassController;


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

Route::Post('/assignments/create', [AssignmentController::class, "addAssignment"]);
Route::get('/assignments', [AssignmentController::class, "showAssignment"]);
Route::PUT('/assignments/edit/{id}', [AssignmentController::class, "editAssignment"]);
Route::delete('/assignments/delete/{id}', [AssignmentController::class, "deleteAssignment"]);


Route::Post('/classes/create', [ClassController::class, "addclass"]);
Route::get('/classes', [ClassController::class, "showclass"]);
Route::PUT('/classes/edit/{id}', [ClassController::class, "editclass"]);
Route::delete('/classes/delete/{id}', [ClassController::class, "deleteclass"]);


Route::prefix('user')->group(function () {
    Route::get('/getAll', [UserController::class, 'getAllUsers']);
    Route::post('/add', [UserController::class, 'addUser']);
    Route::put('/update/{id}', [UserController::class, 'updateUser']);
    Route::put('/delete/{id}/{delete?}', [UserController::class, 'deleteUser']);
});
