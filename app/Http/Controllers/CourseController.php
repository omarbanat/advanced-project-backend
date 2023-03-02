<?php

namespace App\Http\Controllers;

use App\Models\courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CourseController extends Controller
{

    public function getCourses()
    {
        try {
            $courses = courses::all();
            return response()->json([
                "message" => "Courses retrieved successfully",
                "data" => $courses
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Failed to retrieve courses: " . $e->getMessage()
            ], 500);
        }
    }



    public function addCourses(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'durationByDays' => 'required|numeric'
            ]);

            $courses = new courses;
            $courses->title = $validatedData['title'];
            $courses->description = $validatedData['description'];
            $courses->durationByDays = $validatedData['durationByDays'];
            $courses->save();

            return response()->json([
                "message" => "Course created successfully",
                "data" => $courses

            ]);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Failed to create course: " . $e->getMessage()
            ], 500);
        }
    }


    public function editCourses(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'required',
                'durationByDays' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->first()
                ], 400);
            }

            $courses = Courses::find($id);
            $courses->title = $request->json('title');
            $courses->description = $request->json('description');
            $courses->durationByDays = $request->json('durationByDays');
            $courses->save();

            return response()->json([
                "message" => "Course updated successfully"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Course updated failed!",
                "error" => $th
            ]);
        }
    }



    public function deleteCourses($id)
    {
        try {
            $courses = Courses::find($id);
            if (!$courses) {
                return response()->json([
                    "error" => "Course not found"
                ], 404);
            }
            $courses->delete();

            return response()->json([
                "message" => "Course deleted successfully"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "error" => "Failed to delete course: " . $e->getMessage()
            ], 500);
        }
    }
}
