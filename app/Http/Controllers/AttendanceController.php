<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreattendanceRequest;
use App\Http\Requests\UpdateattendanceRequest;
use App\Models\attendance;
use App\Models\CourseCycle;
use App\Models\courses;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AttendanceController extends Controller
{
    public function addAttendance(Request $request)
    {
        $attendance = new attendance;
        error_log($attendance);
        $attendance->attendanceType = $request->input('attendanceType');
        $attendance->date = $request->input('date');
        $attendance->save();
        return response()->json([
            "message" => $request->all()
        ]);
    }

    public function getAttendance()
    {
        $attendances = Attendance::all();

        return response()->json([
            "message" => "Attendance retrieved successfully",
            "data" => $attendances
        ]);
    }

    public function editAttendance(Request $request, $id)
    {
        $attendance = Attendance::find($id);
        $attendance->attendanceType = $request->input('attendanceType');
        $attendance->date = $request->input('date');

        $attendance->save();
        return response()->json([
            "message" => "Attendance updated successfully"
        ]);
    }

    public function deleteAttendance($id)
    {
        $attendance = attendance::find($id);
        $attendance->delete();

        return response()->json([
            "message" => "Deleted successfuly",
        ]);
    }

    public function restoreAttendance($id)
    {
        Attendance::withTrashed()->find($id)->restore();
        return back();
    }

    // scenario 1:
    // choose course -> get all users enrolled to this course -> join with attendace and return Name, date, attendanceType

    // if specifiy the user -> return same data but with filtering only this user
    // same for if added year


    // scenario 2:
    // if firstly choose a user -> users not found -> choose a course first


    // 

    public function getAttendancesByCourseID($id)
    {

        // $course = CourseCycle::select(
        //     'courses.id',
        //     'courses.title',
        //     'course_cycles.id',
        //     'users.id',
        //     'users.fName',
        //     'users.lName',
        //     DB::raw('GROUP_CONCAT(attendances.attendanceType) as all_attendances'),
        //     DB::raw('GROUP_CONCAT(attendances.date) as all_dates')
        // )
        //     ->join('courses', 'courses.id', '=', 'course_cycles.courseID')
        //     ->join('enrollments', 'enrollments.courseCycleID', '=', 'course_cycles.id')
        //     ->join('users', 'users.id', '=', 'enrollments.userID')
        //     ->join('attendances', 'attendances.userID', '=', 'users.id')
        //     ->where('users.role', '=', 'student')
        //     ->where('courses.id', '=', $id)
        //     ->groupBy(
        //         'courses.id',
        //         'courses.title',
        //         'course_cycles.id',
        //         'course_cycles.startDate',
        //         'course_cycles.endDate',
        //         'users.id',
        //         'users.fName',
        //         'users.lName'
        //     )
        //     ->get();

        // return $course;



        $course = CourseCycle::select('*')->join('courses', 'courses.id', '=', 'course_cycles.courseID')
            ->join('enrollments', 'enrollments.courseCycleID', '=', 'course_cycles.id')
            ->join('users', 'users.id', '=', 'enrollments.userID')
            ->join('attendances', 'attendances.userID', '=', 'users.id')
            ->where(
                'users.role',
                '=',
                'student',
            )
            ->where('courses.id', '=', $id)
            ->get();
        return $course;

        // recieve courseID as param
        // get data from courseCycle where courseID = param 
        // get users enrolled in this courseCycle
        // get attendace for all users


        // if specify username, filter only

        // same for year

    }
}
