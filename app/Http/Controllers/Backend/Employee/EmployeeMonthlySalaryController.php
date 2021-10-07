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
use phpDocumentor\Reflection\Types\Float_;

class EmployeeMonthlySalaryController extends Controller
{
    
    public function MonthlySalaryView()
    {
        
        return view('Backend.Employee.Monthly_Salary.MonthlySalary_view');
        


    }

    public function MonthlySalaryGet(Request $request)
    {
        $date = date('Y-m',strtotime($request->date));

        if ($date !='') {
            $where[] = ['date','like',$date.'%'];
        }

        $data = EmployeeAttendence::select('employee_id')->groupBy('employee_id')
        ->with(['user'])->where($where)->get();
        // dd($allStudent);
        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>Employee Name</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Salary for this Month</th>';
        $html['thsource'] .= '<th>Action</th>';
    
    
        foreach ($data as $key => $attend) {
            $totalattend = EmployeeAttendence::with(['user'])->where($where)
            ->where('employee_id',$attend->employee_id)->get();
            $absentcount = count($totalattend->where('attend_status','Absent'));

            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attend['user']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attend['user']['salary'].'</td>';
            
            $salary = (float)$attend['user']['salary'];
            $salaryperday = (float)$salary/30;
            $totalsalaryminus =(float)$absentcount*(float)$salaryperday;
            $totalsalary = (float)$salary-(float)$totalsalaryminus;
    
            $html[$key]['tdsource'] .='<td>'.$totalsalary.' PKR'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" 
            href="'.route("employee.monthly.salary.payslip",$attend->employee_id).'">Fee Slip</a>'; 
            $html[$key]['tdsource'] .= '</td>';
    
        }  
       return response()->json(@$html);
    
    }// end MonthlySalaryGet method 
    

    public function MonthlySalaryPayslip(Request $request)
    {
        # code...
    }



} // End of MonthlyController 
