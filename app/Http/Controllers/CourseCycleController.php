<?php

namespace App\Http\Controllers;

use App\Models\CourseCycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseCycleController extends Controller
{
    public function getAllCourseCycles()
    {
        try {
            $courceCycle = CourseCycle::all();
            return response()->json([
                'message' => $courceCycle
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Error retreving all course cycles...", 'error' => $th
            ], 500);
        }
    }

    public function addCourseCycle(Request $request)
    {

        // $courseID = courses::findOrFail($request->courseID);
        // $durationByDays = $courseID['durationByDays'];



        // $startDate = Carbon::parse($request->startDate);
        // $endDate = Carbon::parse($request->endDate);

        // $difference =  $startDate->diffInDays($endDate);

        // if ($difference != $durationByDays){
        //     return
        //     response()->json([
        //         'message' => "Error retreving all course cycles...", 'error' => $th
        //     ], 401);
        // }

        // return $difference;


        try {

            $rules = [
                'startDate' => 'required|date',
                'endDate' => 'required|date'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $courseID  = $request->input('courseID');

            if (!$courseID)
                return response()->json(['message' => 'courseID should not be null!'], 500);

            $courseCycle = CourseCycle::create($request->all());
            $courseCycle->courseID = $courseID;

            try {
                $courseCycle->save();
                return response()->json(['message' => 'Course cycle added successfully'], 201);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Unable to add course cycle',
                    'error' => $th
                ], 500);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Error to add a course cycle!',
                'error' => $th
            ]);
        }
    }

    public function updateCourseCycle(Request $request, $id)
    {
        try {
            $courseCycle = CourseCycle::findOrFail($id);

            $courseCycle->startDate = $request->input('startDate', $courseCycle->startDate);
            $courseCycle->endDate = $request->input('endDate', $courseCycle->endDate);
            try {
                $courseCycle->update();
                return response()->json([
                    'message' => 'courseCycle updated successfully!!',
                    'data' => $courseCycle
                ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Error occured while updating!',
                    'error' => $th
                ], 404);
            }
        } catch (\Throwable $th) {
            return
                response()->json(['message' => 'course Cycle not found!', 'error' => $th], 404);
        }
    }
}
