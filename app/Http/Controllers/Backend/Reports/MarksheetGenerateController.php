<?php

namespace App\Http\Controllers\Backend\Reports;

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

use App\Models\AccountStudentFee;
use App\Models\FeeCategory;
use App\Models\AssignSubject;
use App\Models\AccountEmpSalary;
use App\Models\AccountOtherCost;



class MarksheetGenerateController extends Controller
{
    
    public function MarksheetGenerateView()
    {

        $data['years'] = StudentYear::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_type'] = ExamType::all();
        
        return view('Backend.Reports.Marksheet.marksheet_view',$data);


    } // End of MonthlyProfitView


    public function GetMarksheetReport(Request $request)
    {  
            $year_id = $request->year_id;
            $class_id = $request->class_id;
            $exam_type_id = $request->exam_type_id;
            $id_no = $request->id_no;

            $countfail = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)
            ->where('id_no',$id_no)->where('marks','<','33')->get()->count();
            //dd( $countfail);

            $singleStudent = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)
            ->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->first();

            if ($singleStudent == true) {
                
                $allMarks = StudentMarks::with(['Assign_subject','year'])->where('year_id',$year_id)->
                where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->get();
               // dd($allMarks->toArray());
                
                $allGrades = MarksGrade::all();
                return view('Backend.Reports.Marksheet.marksheet_pdf',compact('allMarks','allGrades','countfail'));


            } //end of if cond
            else{
                $notification = array('message' =>'Sorry criteria does not match'
                 , 'alert-type'=>'error' );
                 return redirect()->back()->with($notification);

            }



    } // End of GetMarksheetReport





    

} // End of MarksheetGenerateController
