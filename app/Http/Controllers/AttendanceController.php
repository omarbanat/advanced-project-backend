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
         $attendance = new attendance;
         error_log($attendance);
         $attendance->attendanceType = $request->input('attendanceType');
         $attendance->date = $request->input('date');
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

        public function editAttendance(Request $request, $id){
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
     ]);} 

public function restoreAttendance($id){
    Attendance::withTrashed()->find($id)->restore();
    return back();
}



       } 

    

