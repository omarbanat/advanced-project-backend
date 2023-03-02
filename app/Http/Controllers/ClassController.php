<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\classModel;

class ClassController extends Controller
{
    public function addClass(Request $request){

        $request->validate([
            'className' => 'required',
            'studentsNumber' => 'required',
        ]);
        
        $Class = new classModel;
        $Class->className = $request->input('className');
        $Class->studentsNumber = $request->input('studentsNumber');
        $Class->save();
        return response()->json([
        "message" =>$request->all()
        ]);
  }

  public function showClass() {
  
    $Class = classModel::all();
      if (!$Class) {
          return response()->json([
              'message' => 'Announcement not found'
          ], 404);
      }
      return response()->json($Class);
  }

  public function editClass(Request $request, $id) {

  
    $Class = classModel::where('id',$id)->update(
        [
            'className' => $request->input('className'),
            'studentsNumber' => $request->input('studentsNumber'),
        ]
    );
      
      if (!$Class) {
          return response()->json([
              'message' => 'Assignment not found'
          ], 404);
      }
  
      return response()->json([
          'message' => 'Assignment updated successfully',
          'Class' => $Class
      ]);
  }
  public function deleteClass($id) {
    $result = classModel::where('id', $id)->delete();
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

public function restoreClass($id){
    classModel::withTrashed()->find($id)->restore();
    return back();
}


}
