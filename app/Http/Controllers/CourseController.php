<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\courses;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseController extends Controller
{

    public function getCourses(){
        $courses = courses::all();
    
        return response()->json([
            "message" => "Courses retrieved successfully",
            "data" => $courses
        ]);
    }
    public function addCourses(Request $request){
        $courses = new courses;
        $courses->title = $request->input('title');
        $courses->description = $request->input('description');
        $courses->durationByDays = $request->input('durationByDays');
        $courses->save();
        return response()->json([
         "message" =>$request->all()
        ]);
     }
     public function editCourses(Request $request, $id){
        $courses = Courses::find($id);
        $courses->title = $request->input('title');
        $courses->description = $request->input('description');
        $courses->durationByDays = $request->input('durationByDays');
        $courses->save();
        return response()->json([
                "message" => "Course updated successfully"
            ]);
        }
        public function deleteCourses($id){
            $courses = Courses::find($id);
            $courses->delete();

            return response()->json([
                "message" => "Deleted successfuly"
            ]);
        }

    }