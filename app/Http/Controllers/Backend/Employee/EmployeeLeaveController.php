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

class EmployeeLeaveController extends Controller
{
    
    public function EmployeeLeaveView()
    {
        
        $data['allData'] = EmployeeLeave::orderBy('id','desc')->get();
        return view('Backend.Employee.Employee_Leave.EmployeeLeave_View',$data);


    } //End of EmployeeLeaveView

    public function EmployeeLeaveAdd()
    {
        $data['employees'] = User::where('usertype','employee')->get();
        $data['leave_purpose'] = LeavePurpose::all();
        return view('Backend.Employee.Employee_Leave.EmployeeLeave_Add',$data);

    }


    
    public function EmployeeLeaveStore(Request $request)
    {
        if ($request->leave_purpose_id == '0') {
            
            $leavepurpose = new LeavePurpose();
            $leavepurpose->name = $request->name;
            $leavepurpose->save();
            $leave_purpose_id =  $leavepurpose->id;
        }
        else
        {
            $leave_purpose_id = $request->leave_purpose_id;   
        }

        $data = new EmployeeLeave();
        $data->employee_id = $request->employee_id;
        $data->leave_purpose_id =  $leave_purpose_id;
        $data->start_date = date('Y-m-d', strtotime($request->start_date));
        $data->end_date = date('Y-m-d', strtotime($request->end_date));
        $data->save();

        $notification = array('message' =>'Leave Data inserted Successfully' ,
         'alert-type'=>'success' );
        return redirect()->route('employee.leave.veiw')->with($notification);


        
    } //End of Employee Leave Store



    public function EmployeeLeaveEdit($id)
    {
        $data ['editData'] = EmployeeLeave::find($id);
        $data ['employees'] = User::where('usertype','employee')->get();
        $data ['leave_purpose'] = LeavePurpose::all();
        return view('Backend.Employee.Employee_Leave.EmployeeLeave_edit',$data);

        
    }

    public function EmployeeLeaveUpdate(Request $request, $id)
    {
        if ($request->leave_purpose_id == '0') {
            
            $leavepurpose = new LeavePurpose();
            $leavepurpose->name = $request->name;
            $leavepurpose->save();
            $leave_purpose_id =  $leavepurpose->id;
        }
        else
        {
            $leave_purpose_id = $request->leave_purpose_id;   
        }

        $data = EmployeeLeave::find($id);
        $data->employee_id = $request->employee_id;
        $data->leave_purpose_id =  $leave_purpose_id;
        $data->start_date = date('Y-m-d', strtotime($request->start_date));
        $data->end_date = date('Y-m-d', strtotime($request->end_date));
        $data->save();

        $notification = array('message' =>'Leave Data Update Successfully' ,
         'alert-type'=>'success' );
        return redirect()->route('employee.leave.veiw')->with($notification);


        
    } //End of Employee Leave Update

    public function EmployeeLeaveDelete($id)
    {
        $leave = EmployeeLeave::find($id);
        $leave->delete(); 

        $notification = array('message' =>'Leave Data Delete Successfully' ,
        'alert-type'=>'success' );
       return redirect()->route('employee.leave.veiw')->with($notification);

    }


} //End of EmployeeLeave
