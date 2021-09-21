<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    

    public function VeiwShift(){
        $data ['allData'] = StudentShift::all();
        return view('Backend.Setup.Student_Shift.view_Shift', $data);

    }

    public function StudentShiftAdd(){

        return view('Backend.Setup.Student_Shift.add_Shift');

    }

    public function StudentShiftStore(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name',

        ]);

        $data = new StudentShift();
            $data->name = $request->name;
            $data->save();

            $notification = array('message' =>'Student Shift Inserted Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('student.Shift.veiw')->with($notification);
    
    
    }

    public function StudentShiftEdit($id){

        $editData = StudentShift::find($id);
        return view('Backend.Setup.Student_Shift.edit_Shift', compact('editData'));
    }

    public function StudentShiftUpdate(Request $request,$id){
        $data = StudentShift::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name,'.$data->id

        ]);

       
            $data->name = $request->name;
            $data->save();

            $notification = array('message' =>'Student Shift Updated Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('student.Shift.veiw')->with($notification);
    
    }

    public function StudentShiftDelete($id){

        $user = StudentShift::find($id);
        $user->delete();


        $notification = array('message' =>'Student Shift Deleted Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('student.Shift.veiw')->with($notification);
    
    }






}
