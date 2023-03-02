<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Section;


class sectionController extends Controller
{
    public function addSection(Request $request){

        $request->validate([
            'sectionName'=>'required',
            'capacity'=>'required'
        ]);

        $Section = new Section;
        $Section->sectionName = $request->input('sectionName');
        $Section->capacity = $request->input('capacity');
        $Section->save();
        return response()->json([
        "message" =>$request->all()
        ]);
  }

  public function showSection() {
  
    $Section = Section::all();
      if (!$Section) {
          return response()->json([
              'message' => 'Announcement not found'
          ], 404);
      }
      return response()->json($Section);
  }

  public function editSection(Request $request, $id) {

    $request->validate([
        'sectionName'=>'required',
        'capacity'=>'required'
    ]);
    $Section = Section::where('id',$id)->update(

      
        [
            'sectionName' => $request->input('sectionName'),
            'capacity' => $request->input('capacity'),
        ]
    );
      
      if (!$Section) {
          return response()->json([
              'message' => 'Assignment not found'
          ], 404);
      }
  
      return response()->json([
          'message' => 'Assignment updated successfully',
          'section' => $Section
      ]);
  }
  public function deleteSection($id) {
    $result = Section::where('id', $id)->delete();
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

public function restoreSection($id){
    Section::withTrashed()->find($id)->restore();
    return back();
}


}
