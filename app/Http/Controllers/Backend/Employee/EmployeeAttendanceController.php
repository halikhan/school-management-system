<?php

namespace App\Http\Controllers\Backend\Employee;

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
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf as FacadesPdf;

use App\Models\Designation;
use App\Models\EmployeeSallaryLog;
use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;
use App\Models\EmployeeAttendence;


class EmployeeAttendanceController extends Controller
{
    public function EmpAttendanceView()
    {
        $data['allData'] =  EmployeeAttendence::select('date')->groupBy('date')
        ->orderBy('id','DESC')->get();
        //$data['allData'] =  EmployeeAttendence::orderBy('id','DESC')->get();
        return view('Backend.Employee.Employee_Attendence.EmployeeAttendence_view',$data);
        

    } // End of View 

    public function EmpAttendanceAdd()
    {
        $data['employees'] = User::where('usertype','employee')->get();
        return view('Backend.Employee.Employee_Attendence.EmployeeAttendence_Add',$data);



    } // End of Add

    public function EmpAttendanceStore(Request $request)
    {
        // this code is For Update 
        EmployeeAttendence::where('date', date('Y-m-d',strtotime($request->date)))->delete();

        //This is Data inserted Code
        $countEmployee = count($request->employee_id);
        for ($i=0; $i < $countEmployee ; $i++) { 
            $attend_status = 'attend_status'.$i;
            $attend = new EmployeeAttendence();
            $attend->date = date('Y-m-d',strtotime($request->date));
            $attend->employee_id = $request->employee_id[$i];
            $attend->attend_status = $request-> $attend_status;
            $attend->save(); 

            
        } //End of Forloop
        $notification = array('message' =>'Emp Attendence Insert or Updated Successfully' ,
            'alert-type'=>'success');
           return redirect()->route('employee.attendance.veiw')->with($notification);
   

    } //end method

    public function EmpAttendanceEdit($date)
    {
       $data['editData'] = EmployeeAttendence::where('date',$date)->get();
       $data['employees'] = User::where('usertype','employee')->get();
       return view('Backend.Employee.Employee_Attendence.EmployeeAttendence_Edit',$data);


    }

    public function EmpAttendanceDetails($date)
    {
        $data['details'] = EmployeeAttendence::where('date',$date)->get();
        return view('Backend.Employee.Employee_Attendence.EmployeeAttendence_Details',$data);

    }







} //end of main controller
