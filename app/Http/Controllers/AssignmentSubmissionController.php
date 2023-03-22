<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\assignmentSubmissions;

class AssignmentSubmissionController extends Controller
{
    public function addAssignmentSubmission(Request $request){
//   $request->validate([
    
//             'submission'=>'required',
//         ]);


        $assignmentSubmission = assignmentSubmissions::create($request->all());
        $assignmentSubmission->userID = $request->userID;
        $assignmentSubmission->assignmentID = $request->assignmentID;
        $assignmentSubmission->submissionDate = $request->input('submissionDate', null);
        $assignmentSubmission->grade = $request->input('grade', null);
        $assignmentSubmission->submission = $request->input('submission', null);

        $assignmentSubmission->save();
         return response()->json([
          "message" =>$request->all()
         ]);
      }
      public function showAssignmentSubmission() {
      
        $assignmentsSubmission = assignmentSubmissions::all();
          if (!$assignmentsSubmission) {
              return response()->json([
                  'message' => 'Announcement not found'
              ], 404);
          }
          return response()->json($assignmentsSubmission);
      }
}
