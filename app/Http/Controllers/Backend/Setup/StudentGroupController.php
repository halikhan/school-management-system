<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    
    public function VeiwGroup(){
        $data ['allData'] = StudentGroup::all();
        return view('Backend.Setup.Student_Group.view_group', $data);

    }

    public function StudentGroupAdd(){

        return view('Backend.Setup.Student_Group.add_group');

    }

    public function StudentGroupStore(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name',

        ]);

        $data = new StudentGroup();
            $data->name = $request->name;
            $data->save();

            $notification = array('message' =>'Student Group Inserted Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('student.group.veiw')->with($notification);
    
    
    }

    public function StudentGroupEdit($id){

        $editData = StudentGroup::find($id);
        return view('Backend.Setup.Student_Group.edit_group', compact('editData'));
    }

    public function StudentGroupUpdate(Request $request,$id){
        $data = StudentGroup::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name,'.$data->id

        ]);

       
            $data->name = $request->name;
            $data->save();

            $notification = array('message' =>'Student Group Updated Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('student.group.veiw')->with($notification);
    
    }

    public function StudentGroupDelete($id){

        $user = StudentGroup::find($id);
        $user->delete();


        $notification = array('message' =>'Student Group Deleted Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('student.group.veiw')->with($notification);
    
    }




}
