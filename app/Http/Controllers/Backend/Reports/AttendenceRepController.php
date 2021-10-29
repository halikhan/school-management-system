<?php

namespace App\Http\Controllers\Backend\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeAttendence;
use App\Models\User;

use niklasravnsborg\LaravelPdf\Facades\Pdf as FacadesPdf;


class AttendenceRepController extends Controller
{
    
    public function AttendenceRepView()
    {
       
        $data['epmloyees'] = User::where('usertype','employee')->get();

        return view('Backend.Reports.Attendence.Atten_ReportView',$data);



    } // End of AttendenceRepView

    public function AttendenceRepGET(Request $request)
    {
       
        $employee_id = $request->employee_id;
        if ($employee_id != '') {
            
            $where[] = ['employee_id',$employee_id];

        }
        $date = date('Y-m',strtotime($request->date));
        if ($date != '') {
            $where[] = ['date','like',$date.'%'];
        }
        $singleAttendence = EmployeeAttendence::with(['user'])->where($where)->get();
        if ( $singleAttendence == true) {
           
            $data['allData'] = EmployeeAttendence::with(['user'])->where($where)->get();
            //dd($data['allData']->toArray());

            $data['Absents'] = EmployeeAttendence::with(['user'])->where($where)->where('attend_status','Absent')->get()->count();
          
            $data['Leaves'] = EmployeeAttendence::with(['user'])->where($where)->where('attend_status','Leave')->get()->count();
            
            $data['Presents'] = EmployeeAttendence::with(['user'])->where($where)->where('attend_status','Present')->get()->count();

            $data['month'] = date('m-Y',strtotime($request->date));

            $pdf = FacadesPdf::loadView('Backend.Reports.Attendence.Atten_Report_PDF', $data);
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf'); 
            
        } else{
            $notification = array('message' =>'Sorry criteria does not match'
             , 'alert-type'=>'error' );
             return redirect()->back()->with($notification);

        }


        

    } // End of AttendenceRepGET



} // End of AttendenceRepController
