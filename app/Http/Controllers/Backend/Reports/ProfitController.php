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

class ProfitController extends Controller
{
    
    public function MonthlyProfitView()
    {
        
        return view('Backend.Reports.Profit.profit_view');


    } // End of MonthlyProfitView

    public function MonthlyProfitDatewise(Request $request)
    {
        
        $start_date = date('Y-m',strtotime($request->start_date));
        $end_date = date('Y-m',strtotime($request->end_date));
        $s_date = date('Y-m-d',strtotime($request->start_date));
        $e_date = date('Y-m-d',strtotime($request->end_date));


        $student_fee = AccountStudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');
        $Other_cost = AccountOtherCost::whereBetween('date',[$s_date,$e_date])->sum('amount');
        $emp_salary = AccountEmpSalary::whereBetween('date',[$start_date,$end_date])->sum('amount');

        $total_cost = $Other_cost+$emp_salary;
        $profit = $student_fee-$total_cost;

        $html['thsource']  = '<th>Student Fee</th>';
        $html['thsource'] .= '<th>Other Cost</th>';
        $html['thsource'] .= '<th>Employee Salary</th>';
        $html['thsource'] .= '<th>Total Cost</th>';
        $html['thsource'] .= '<th>Profit</th>';
        $html['thsource'] .= '<th>Action</th>';
    
        $color = 'success';
        $html['tdsource'] = '<td>'.$student_fee.'</td>'; 
        $html['tdsource'] .= '<td>'.$Other_cost.'</td>';
        $html['tdsource'] .= '<td>'.$emp_salary.'</td>';
        $html['tdsource'] .= '<td>'.$total_cost.'</td>';
        $html['tdsource'] .= '<td>'.$profit.'</td>';
        $html['tdsource'] .='<td>';
        $html['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PDF" target="_blanks" 
        href="'.route("report.profit.pdf").'?start_date='.$s_date.'&end_date='.$e_date.'">Pay Slip</a>'; 
        $html['tdsource'] .= '</td>';
        
       return response()->json(@$html);

    } // end of MonthlyProfitDatewise


    public function ReportProfitPDF(Request $request)
    {
        
        $data['start_date'] = date('Y-m',strtotime($request->start_date));
        $data['end_date'] = date('Y-m',strtotime($request->end_date));
        $data['s_date'] = date('Y-m-d',strtotime($request->start_date));
        $data['e_date'] = date('Y-m-d',strtotime($request->end_date));

        $pdf = FacadesPdf::loadView('Backend.Reports.Profit.Profit_PDF', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf'); 

        
    } //End of ReportProfitPDF




} // End of ProfitController
