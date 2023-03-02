<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\announcements;



class AnnouncementController extends Controller
{
    public function addAnnouncement(Request $request){
        $announcement = new Announcements;
         $announcement->title = $request->input('title');
         $announcement->description = $request->input('description');
         $announcement->senderID = $request->input('sentBy');
         $announcement->receiverID = $request->input('to');
         $announcement->save();
         return response()->json([
          "message" =>$request->all()
         ]);
      }

      public function showAnnouncement() {
      
        $announcements = Announcements::all();
          if (!$announcements) {
              return response()->json([
                  'message' => 'Announcement not found'
              ], 404);
          }
          return response()->json($announcements);
      }

      public function editAnnouncement(Request $request, $id)  {

      

          $announcement = Announcements::where('id',$id)->update(
            [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'senderID' => $request->input('sentBy'),
                'receiverID' => $request->input('to'),
            ]
        );
          
          if (!$announcement) {
              return response()->json([
                  'message' => 'Announcement not found'
              ], 404);
          }
      
          return response()->json([
              'message' => 'Announcement updated successfully',
              'announcement' => $announcement
          ]);
      }

public function deleteAnnouncement($id) {
    $result = Announcements::where('id', $id)->delete();
    if ($result) {
        return response()->json([
            'message' => 'Announcement deleted successfully'
        ]);
    } else {
        return response()->json([
            'message' => 'Announcement not found'
        ], 404);
    }
}

public function restoreAnnouncement($id){
    Announcements::withTrashed()->find($id)->restore();
    return back();
}

}