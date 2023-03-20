<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnrollmentController extends Controller
{

    public function getAllEnrollments()
    {
        try {
            $enrollments = Enrollment::all();
            return response()->json([
                'message' => $enrollments
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Error retreving enrollments...", 'error' => $th
            ], 500);
        }
    }

    public function addEnrollment(Request $request)
    {
        $rules = [
            'userID' => 'required|exists:users,id',
            'classID' => 'exists:classes,id',
            'courseCycleID' => 'required|exists:course_cycles,id',
            'cancelled' => 'boolean',
            
        ];

        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $enrollment = Enrollment::create($request->all());
        $enrollment->userID = $request->userID;
        $enrollment->classSectionID = $request->input('classSectionID', null);
        $enrollment->cancellationReason = $request->input('cancellationReason', null);
        $enrollment->enrolled = $request->input('enrolled', false);
        $enrollment->cancelled = $request->input('cancelled', false);
        $enrollment->courseCycleID = $request->courseCycleID;

        try {
            $enrollment->save();
            return response()->json(['message' => 'User enrolled to course successfully'], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Unable to enroll user to this course',
                'error' => $th
            ], 500);
        }

        try {
            Enrollment::create([]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Unable to enroll!',
                'error' => $th
            ]);
        }
    }

    public function updateEnrollment(Request $request, $id)
    {
        try {
            $enrollment = Enrollment::findOrFail($id);

            $enrollment->cancelled = $request->input('cancelled');
            if ($enrollment->cancelled)
                $enrollment->cancellationReason = $request->input('cancellationReason', $request->cancellationReason);
            else
                $enrollment->cancellationReason = null;

            try {
                $enrollment->update();

                return response()->json([
                    'message' => 'Enrollment user updated successfully!!',
                    'data' => $enrollment
                ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Error occured while updating!',
                    'error' => $th
                ], 404);
            }
        } catch (\Throwable $th) {
            response()->json(['message' => 'User not enrolled!', 'error' => $th], 404);
        }
    }

       
    public function deleteEnrollment($id)
    {
        $enrollment = Enrollment::find($id);
        $enrollment->delete();
   
         return response()->json([
            "message" => "Deleted successfuly",
        ]);} 

    public function restoreEnrollment($id){
        Enrollment::withTrashed()->find($id)->restore();
        return back();
    }
}
