<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreattendanceRequest;
use App\Http\Requests\UpdateattendanceRequest;
use App\Models\attendance;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request; 

class AttendanceController extends Controller
{
    public function addAttendance(Request $request){
        $attendance = new Attendance;
         $attendance->attendanceType = $request->input('attendanceType');
         $attendance->date = \Carbon\Carbon::now();
         $attendance->isDeleted = false;
         $attendance->save();
         return response()->json([
          "message" =>$request->all()
         ]);
      }

      public function getAttendance(){
    $attendances = Attendance::all();

    return response()->json([
        "message" => "Attendance retrieved successfully",
        "data" => $attendances
    ]);
}

    
}
