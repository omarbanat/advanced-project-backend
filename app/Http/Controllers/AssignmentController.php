<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\assignments;
class AssignmentController extends Controller
{
    public function addAssignment(Request $request){


        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'dueDate' => 'required'
        ]);



        $assignment = new Assignments;
         $assignment->title = $request->input('title');
         $assignment->description = $request->input('description');
         $assignment->dueDate = $request->input('dueDate');
         $assignment->grade = $request->input('grade');
         $assignment->save();
         return response()->json([
          "message" =>$request->all()
         ]);
      }

      public function showAssignment() {
      
        $assignments = Assignments::all();
          if (!$assignments) {
              return response()->json([
                  'message' => 'Announcement not found'
              ], 404);
          }
          return response()->json($assignments);
      }

      public function editAssignment(Request $request, $id) {


    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'dueDate' => 'required',
        'grade' => 'required',
    ]);
      
        $assignment = Assignments::where('id',$id)->update(


            [
                'title' => $request->input('title')->require,
                'description' => $request->input('description')->require,
                'dueDate' => $request->input('dueDate')->require,
                'grade' => $request->input('grade')->require,
            ]
        );
          
          if (!$assignment) {
              return response()->json([
                  'message' => 'Assignment not found'
              ], 404);
          }
      
          return response()->json([
              'message' => 'Assignment updated successfully',
              'assignment' => $assignment
          ]);
      }
      public function deleteAssignment($id) {
        $result = Assignments::where('id', $id)->delete();
        if ($result) {
            return response()->json([
                'message' => 'Assignment deleted successfully'
            ]);
        } else {
            return response()->json([
                'message' => 'Assignment not found'
            ], 404);
        }

}

public function restoreAssignment($id){
    Assignments::withTrashed()->find($id)->restore();
    return back();
}

}
