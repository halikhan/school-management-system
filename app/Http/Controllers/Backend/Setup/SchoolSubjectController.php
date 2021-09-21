<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;

class SchoolSubjectController extends Controller
{
    public function VeiwSchoolSubject(){
        $data ['allData'] = SchoolSubject::all();
        return view('Backend.Setup.School_Subject.view_SchoolSub', $data);

    }

    public function SchoolSubjectAdd(){

        return view('Backend.Setup.School_Subject.add_SchoolSub');

    }

    public function SchoolSubjectStore(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:school_subjects,name',

        ]);

        $data = new SchoolSubject();
            $data->name = $request->name;
            $data->save();

            $notification = array('message' =>'School Subject Inserted Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('School.Subject.veiw')->with($notification);
    
    
    
    }

    public function SchoolSubjectEdit($id){

        $editData = SchoolSubject::find($id);
        return view('Backend.Setup.School_Subject.edit_SchoolSub', compact('editData'));
    }

    public function SchoolSubjectUpdate(Request $request,$id){
        $data = SchoolSubject::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:school_subjects,name,'.$data->id

        ]);

       
            $data->name = $request->name;
            $data->save();

            $notification = array('message' =>'School Subject Updated Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('School.Subject.veiw')->with($notification);
    
    

    }

    public function SchoolSubjectDelete($id){

        $user = SchoolSubject::find($id);
        $user->delete();


        $notification = array('message' =>'School Subject Deleted Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('School.Subject.veiw')->with($notification);
    
    }


}
