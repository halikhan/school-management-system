<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AssignStudents;
use App\Models\User;
use App\Models\DiscountStudents;
use App\Models\FeeAmount;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\ExamType;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\SchoolSubject;

use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf as FacadesPdf;

use App\Models\Designation;
use App\Models\EmployeeSallaryLog;
use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;
use App\Models\EmployeeAttendence;

use phpDocumentor\Reflection\Types\Float_;
use App\Models\StudentMarks;

class MarksEntryController extends Controller
{

    public function MarkEntryAdd()
    {
       
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_type'] = ExamType::all();
        return view('Backend.Marks.MarksEntry.Marks_Entry_view',$data);


    } // End of MarkEntryAdd

   public function MarkEntryStore(Request $request)
   {
      
        
        $studentcount = $request->student_id;
        if ( $studentcount) {
            for ($i=0; $i <count($request->student_id) ; $i++) { 

                $data = new StudentMarks();
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->assign_subject_id = $request->assign_subject_id;
                $data->exam_type_id = $request->exam_type_id;
                $data->student_id = $request->student_id[$i];
                $data->id_no = $request->id_no[$i];
                $data->marks = $request->marks[$i];
                $data->save();


            } //end of loop
        } //end of IF cond
    
             $notification = array('message' =>'Student Marks Inserted Successfully' ,
            'alert-type'=>'success');
           return redirect()->back()->with($notification);
   


   } // End of MarkEntry sTORE


   public function MarksEdit()
   {

    $data['years'] = StudentYear::all();
    $data['classes'] = StudentClass::all();
    $data['exam_type'] = ExamType::all();
    return view('Backend.Marks.MarksEntry.Marks_Entry_edit',$data);
    

   } // End of MarkEntry Edit


   public function GetEditMarks(Request $request)
   {
      $year_id = $request->year_id;
      $class_id = $request->class_id;
      $assign_subject_id = $request->assign_subject_id;
      $exam_type_id = $request->exam_type_id;

      $getstudent = StudentMarks::with(['student'])->where('year_id',$year_id)->where('class_id',$class_id)->
      where('assign_subject_id',$assign_subject_id)->where('exam_type_id',$exam_type_id)->get();
        return response()->json( $getstudent);

        

   } // End of GetEditMarks

   public function MarksUpdate(Request $request)
   {
      
        StudentMarks::where('year_id',$request->year_id)->where('class_id',$request->class_id)->
        where('assign_subject_id',$request->assign_subject_id)->
        where('exam_type_id',$request->exam_type_id)->delete();  

        $studentcount = $request->student_id;
        if ( $studentcount) {
            for ($i=0; $i <count($request->student_id) ; $i++) { 

                $data = new StudentMarks();
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->assign_subject_id = $request->assign_subject_id;
                $data->exam_type_id = $request->exam_type_id;
                $data->student_id = $request->student_id[$i];
                $data->id_no = $request->id_no[$i];
                $data->marks = $request->marks[$i];
                $data->save();


            } //end of loop
        } //end of IF cond
    
             $notification = array('message' =>'Student Marks Updated Successfully' ,
            'alert-type'=>'success');
           return redirect()->back()->with($notification);
   

   } // End of MarksUpdate

   
   
}  // End of MarksEntryController
