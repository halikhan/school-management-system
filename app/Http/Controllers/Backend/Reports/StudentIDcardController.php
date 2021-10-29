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

use App\Models\AssignStudents;


class StudentIDcardController extends Controller
{
    
    public function StudentIDcardView()
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        
        return view('Backend.Reports.ID_Card.ID_CardView',$data);
        
        


    } // End of StudentIDcardView

    public function StudentIDcardGet(Request $request)
    {
        
        $year_id = $request->year_id;
        $class_id = $request->class_id;

        $chechData = AssignStudents::where('year_id',$year_id)->where
            ('class_id',$class_id)->first();

            if ( $chechData == true) {
                
                $data['allData'] = AssignStudents::where('year_id',$year_id)->where('class_id',$class_id)->get();
               /// dd( $data['allData']->toArray());
                
                
                $pdf = FacadesPdf::loadView('Backend.Reports.ID_Card.ID_CardPDF',$data);
                $pdf->SetProtection(['copy', 'print'], '', 'pass');
                return $pdf->stream('document.pdf'); 
                
            } 
            else{
                $notification = array('message' =>'Sorry criteria does not match'
                 , 'alert-type'=>'error' );
                 return redirect()->back()->with($notification);
    
            }
        

    } // End of StudentIDcardGet



} // End of StudentIDcardController
