<?php

namespace App\Http\Controllers\Backend\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\StudentMarks;
use App\Models\MarksGrade;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\ExamType;
use niklasravnsborg\LaravelPdf\Facades\Pdf as FacadesPdf;



class StudentResultController extends Controller
{
    public function StudentResultView()
    {
     
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_type'] = ExamType::all();
        
        return view('Backend.Reports.StudentResult.StudentResult_view',$data);
        

    }  // End of StudentResultView


    public function StudentResultGet(Request $request)
    {
        
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;

        $countfail = StudentMarks::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)
        ->where('marks','<','33')->get()->count();

            $singleResult = StudentMarks::where('year_id',$year_id)->where
            ('class_id',$class_id)->where('exam_type_id',$exam_type_id)->first();

            if ( $singleResult == true) { 
                
                $data['allData'] = StudentMarks::select('year_id','class_id','exam_type_id','student_id')->where
                ('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)
                ->groupBy('year_id')->groupBy('class_id')->groupBy('exam_type_id')->groupBy('student_id')->get();
               /// dd( $data['allData']->toArray());

               $allMarks = StudentMarks::with(['Assign_subject','year'])->where('year_id',$year_id)->
                where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->get();
               // dd($allMarks->toArray());
                $allGrades = MarksGrade::all();
                
                
                $pdf = FacadesPdf::loadView('Backend.Reports.StudentResult.StudentResult_pdf',
                compact('allMarks','allGrades','countfail'),$data);
                $pdf->SetProtection(['copy', 'print'], '', 'pass');
                return $pdf->stream('document.pdf'); 
                
            } 
            else{
                $notification = array('message' =>'Sorry criteria does not match'
                 , 'alert-type'=>'error' );
                 return redirect()->back()->with($notification);
    
            }


    } //End of StudentResultGet



} // End of StudentResultController
