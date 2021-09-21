<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use App\Models\AssignSubject;

class AssignSubjectController extends Controller
{
  
    public function VeiwAssignSubject(){
        //$data ['allData'] = FeeAmount::all();

        $data ['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('Backend.Setup.Assign_Subject.view_AssignSubject', $data);

    }


    public function AssignSubjectAdd(){

        $data['Subjects'] = SchoolSubject::all();
        $data['Classes'] = StudentClass::all();
        return view('Backend.Setup.Assign_Subject.add_AssignSubject',$data);

    }

    public function AssignSubjectStore(Request $request){

        $Subjectcount = count($request->subject_id);
        if ($Subjectcount != null) {
            for ($i=0; $i <$Subjectcount ; $i++) { 
                $Assign_subject = new AssignSubject();
                $Assign_subject ->class_id = $request->class_id;
                $Assign_subject ->subject_id = $request->subject_id[$i];
                $Assign_subject ->full_mark = $request->full_mark[$i];
                $Assign_subject ->pass_mark = $request->pass_mark[$i];
                $Assign_subject ->subjective_mark = $request->subjective_mark[$i];
                $Assign_subject ->save();
                
            } #End of Loop
            
        } #End of if cond

              $notification = array('message' =>'Assign Subject Inserted Successfully ' , 'alert-type'=>'success' );
              return redirect()->route('Assign.Subject.veiw')->with($notification);
      
    
    
    }

    public function AssignSubjectEdit($class_id){

        $data ['editData'] = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        // dd( $data ['editData']->toArray());

        $data['Subjects'] = SchoolSubject::all();
        $data['Classes'] = StudentClass::all();
        return view('Backend.Setup.Assign_Subject.edit_AssignSubject',$data);

    }





    public function AssignSubjectUpdate(Request $request,$class_id){
       
        if ($request->subject_id == NULL) {
            
            $notification = array('message' =>'Kindly Select Assign Subject First ' , 'alert-type'=>'error' );
              return redirect()->route('Assign.Subject.edit',$class_id)->with($notification);
      

        }
        
        else
        {
            $countclass = count($request->subject_id);
           
            AssignSubject::where('class_id',$class_id)->delete();
            for ($i=0; $i <$countclass ; $i++) { 
                
                $Assign_subject = new AssignSubject();
                $Assign_subject ->class_id = $request->class_id;
                $Assign_subject ->subject_id = $request->subject_id[$i];
                $Assign_subject ->full_mark = $request->full_mark[$i];
                $Assign_subject ->pass_mark = $request->pass_mark[$i];
                $Assign_subject ->subjective_mark = $request->subjective_mark[$i];
                $Assign_subject ->save();
                
            } #End of Loop
           
        } // End of Else

            
        $notification = array('message' =>'Assign Subject Updated Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('Assign.Subject.veiw')->with($notification);
       


    } // end of Method



    public function AssignSubjectDetails($class_id){

        $data ['detailsData'] = AssignSubject::where('class_id',
        $class_id)->orderBy('subject_id','asc')->get();
       
        return view('Backend.Setup.Assign_Subject.details_AssignSubject',$data);


    }





}
