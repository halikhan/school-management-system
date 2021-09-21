<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;


class ExamTypeController extends Controller
{
    
    public function VeiwExamType(){
        $data ['allData'] = ExamType::all();
        return view('Backend.Setup.Exam_Type.view_ExamType', $data);

    }

    public function ExamTypeAdd(){

        return view('Backend.Setup.Exam_Type.add_ExamType');

    }

    public function ExamTypeStore(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:exam_types,name',

        ]);

        $data = new ExamType();
            $data->name = $request->name;
            $data->save();

            $notification = array('message' =>'ExamType Inserted Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('Exam.Type.veiw')->with($notification);
    
    
    
    }

    public function ExamTypeEdit($id){

        $editData = ExamType::find($id);
        return view('Backend.Setup.Exam_Type.edit_ExamType', compact('editData'));
    }

    public function ExamTypeUpdate(Request $request,$id){
        $data = ExamType::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:exam_types,name,'.$data->id

        ]);

       
            $data->name = $request->name;
            $data->save();

            $notification = array('message' =>'ExamType Updated Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('Exam.Type.veiw')->with($notification);
    
    

    }

    public function ExamTypeDelete($id){

        $user = ExamType::find($id);
        $user->delete();


        $notification = array('message' =>'ExamType Deleted Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('Exam.Type.veiw')->with($notification);
    
    }



}
