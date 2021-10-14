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
use App\Models\MarksGrade;

class MarksGradeController extends Controller
{
   
    public function MarkGradeView()
    {
       
        $data['allData'] = MarksGrade::all();
        return view('Backend.Marks.Marks_Grade.Marks_Grade_view', $data);


    } // End of MarksGrade View

    public function MarkGradeAdd()
    {
        return view('Backend.Marks.Marks_Grade.Marks_Grade_add');



    }  // End of MarksGrade Add


    public function MarkGradeStore(Request $request)
    {
        
        $data = new MarksGrade();
        $data->grade_name = $request->grade_name;
        $data->grade_point = $request->grade_point;
        $data->start_marks = $request->start_marks;
        $data->end_marks = $request->end_marks;
        $data->start_point = $request->start_point;
        $data->end_point = $request->end_point;
        $data->remarks = $request->remarks;
        $data->save();


        $notification = array('message' =>'Grade Marks Inserted Successfully' ,
        'alert-type'=>'success');
        return redirect()->route('mark.entry.grade')->with($notification);


    } // End of MarksGrade Store

    public function MarkGradeEdit($id)
    {
       
        $data['editData'] = MarksGrade::find($id);
        return view('Backend.Marks.Marks_Grade.Marks_Grade_edit', $data);


    } // End of MarksGrade Edit

    public function MarkGradeUpdate(Request $request,$id)
    {
        
        $data = MarksGrade::find($id);
        $data->grade_name = $request->grade_name;
        $data->grade_point = $request->grade_point;
        $data->start_marks = $request->start_marks;
        $data->end_marks = $request->end_marks;
        $data->start_point = $request->start_point;
        $data->end_point = $request->end_point;
        $data->remarks = $request->remarks;
        $data->save();


        $notification = array('message' =>'Grade Marks Updated Successfully' ,
        'alert-type'=>'success');
        return redirect()->route('mark.entry.grade')->with($notification);



    } // End of MarksGrade Update





}  // End of MarksGradeController
