<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

use App\Models\Manage_Room;

class ManageRoomController extends Controller
{
    // Manage Rooms
    public function index()
    {
        $rooms = Manage_Room::all();
        $roomtypes = DB::table('room_types')->get();

        // return view('admin.admin_manage-rooms', compact('rooms'));
        return view('admin.admin_manage-rooms')->with(['rooms'=> $rooms, 'roomtypes' => $roomtypes]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'room_number' => 'required|numeric',
            'room_type' => 'required',
            'room_description' => 'required',
            'max_capacity' => 'required|numeric',
            'status' => 'required',
            'rate' => 'required|numeric',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif,max:2048',
        ]);

        $rooms = new Manage_Room;

        $rooms->room_number = $request->input('room_number');
        $rooms->room_type = $request->input('room_type');
        $rooms->room_description = $request->input('room_description');
        $rooms->max_capacity = $request->input('max_capacity');
        $rooms->amenities = '';
        $rooms->status = $request->input('status');
        $rooms->rate = $request->input('rate');
        // $rooms->photos = $request->input('photos');

        if($request->hasfile('photos')){
            $file = $request->file('photos');
            $extension = $file->getClientOriginalExtension(); //getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/rooms/', $filename);
            $rooms["photos"] = $filename;
        }else{
            return $request;
            $rooms["photos"] = "";
        }

        $rooms->save();
        $curroomid = $rooms->id;
        
        $insertamenity = array();
        
        if($request->input('amenities')){
            foreach($request->input('amenities') AS $amenity){
                $insertamenity[] = ['room_id' => $curroomid, 'name' => $amenity];
            }
        }

        if($request->input('otheramenities')){
            $otheramenities = explode(",", $request->input('otheramenities'));
            
            foreach($otheramenities AS $otheramenity){
                $insertamenity[] = ['room_id' => $curroomid, 'name' => $otheramenity];
            }
        }

        DB::table('room_amenities')->insert($insertamenity);

        return redirect()->route('admin.room.index')->with('success', 'The room has been successfully added.');
    }

    public function edit($id){
{ 
     
    $room = manage_room::findOrFail($id);
    return view('room_number', compact('room_number'));

}

    }
     public function destroy($id)
     {
        $room = Manage_Room::find($id);

        $destination = 'uploads/rooms/'.$room->photos;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $room->delete();

        return redirect()->route('admin.room.index')->with('success', 'Room deleted successfully');
     }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'room_number' => 'required|numeric',
            'room_type' => 'required',
            'room_description' => 'required',
            'max_capacity' => 'required|numeric',
            'status' => 'required',
            'rate' => 'required|numeric',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $room = Manage_Room::find($id);

        if (!$room) {
            abort(404, 'Room not found');
        }

        $room->room_number = $request->input('room_number');
        $room->room_description = $request->input('room_description');
        $room->room_type = $request->input('room_type');
        $room->max_capacity = $request->input('max_capacity');
        $room->amenities = '';
        $room->status = $request->input('status');
        $room->rate = $request->input('rate');

        if($request->hasfile('photos')){
            $destination = 'uploads/rooms/'.$room->photos;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('photos');
            $extension = $file->getClientOriginalExtension(); //getting image extension
            $filename = time() . '.' . $extension;
            $file->move('uploads/rooms/', $filename);
            $rooms["photos"] = $filename;
            $room->photos = $filename;
        }

        $room->save();

        DB::table('room_amenities')->where('room_id', $id)->delete();

        $insertamenity = array();
        
        if($request->input('amenities')){
            foreach($request->input('amenities') AS $amenity){
                $insertamenity[] = ['room_id' => $id, 'name' => $amenity];
            }
        }

        if($request->input('otheramenities')){
            $otheramenities = explode(",", $request->input('otheramenities'));
            
            foreach($otheramenities AS $otheramenity){
                $insertamenity[] = ['room_id' => $id, 'name' => $otheramenity];
            }
        }

        DB::table('room_amenities')->insert($insertamenity);

        return redirect()->route('admin.room.index')->with('success', 'The room has been successfully updated.')->with('rooms', $room);
    }




}



