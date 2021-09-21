<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function VeiwStudent(){
        $data ['allData'] = StudentClass::all();
        return view('Backend.Setup.Student_class.View_Class', $data);

    }

    public function StudentClassAdd(){

        return view('Backend.Setup.Student_class.Add_Class');

    }

    public function StudentClassStore(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name',

        ]);

        $data = new StudentClass();
            $data->name = $request->name;
            $data->save();

            $notification = array('message' =>'Student Class Inserted Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('student.class.veiw')->with($notification);
    
    
    
    }

    public function StudentClassEdit($id){

        $editData = StudentClass::find($id);
        return view('Backend.Setup.Student_class.edit_Class', compact('editData'));
    }

    public function StudentClassUpdate(Request $request,$id){
        $data = StudentClass::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_classes,name,'.$data->id

        ]);

       
            $data->name = $request->name;
            $data->save();

            $notification = array('message' =>'StudentClass Updated Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('student.class.veiw')->with($notification);
    
    

    }

    public function StudentClassDelete($id){

        $user = StudentClass::find($id);
        $user->delete();


        $notification = array('message' =>'StudentClass Deleted Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('student.class.veiw')->with($notification);
    
    }




}
