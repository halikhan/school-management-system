<?php

namespace App\Http\Controllers\Backend\Account;

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

class AccountEmpSalaryController extends Controller
{

    public function AccountEmpSalaryView()
    {
        
        $data['allData'] = AccountEmpSalary::all();
        return view('Backend.Accounts.Employee_Salary.Emp_salary_view', $data);



    } //End of AccountEmpSalaryView

    public function AccountEmpSalaryAdd()
    {
       
        return view('Backend.Accounts.Employee_Salary.Emp_salary_Add');

    } //End of AccountEmpSalary Add

    public function AccountGetEmployee(Request $request)
    {
        $date = date('Y-m',strtotime($request->date));

        if ($date !='') {
            $where[] = ['date','like',$date.'%'];
        }

        $data = EmployeeAttendence::select('employee_id')->groupBy('employee_id')
        ->with(['user'])->where($where)->get();
        // dd($allStudent);
        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>ID NO</th>';
        $html['thsource'] .= '<th>Employee Name</th>';
        $html['thsource'] .= '<th>Basic Salary</th>';
        $html['thsource'] .= '<th>Salary for this Month</th>';
        $html['thsource'] .= '<th>Select</th>';
    
    
        foreach ($data as $key => $attend) {


            $acoount_salary = AccountEmpSalary::where('employee_id',$attend->employee_id)->
            where('date',$date)->first();

            if($acoount_salary !=null) {
                $checked = 'checked';
             }else{
             $checked = '';
             } 

            $totalattend = EmployeeAttendence::with(['user'])->where($where)
            ->where('employee_id',$attend->employee_id)->get();
            $absentcount = count($totalattend->where('attend_status','Absent'));

            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attend['user']['id_no']. 
            '<input type="hidden" name="date" value= " '.$date.' " >'.'</td>';
            
            $html[$key]['tdsource'] .= '<td>'.$attend['user']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$attend['user']['salary'].'</td>';
            
            $salary = (float)$attend['user']['salary'];
            $salaryperday = (float)$salary/30;
            $totalsalaryminus =(float)$absentcount*(float)$salaryperday;
            $totalsalary = (float)$salary-(float)$totalsalaryminus;
    
            $html[$key]['tdsource'] .='<td>'.$totalsalary.' PKR'. 
            '<input type="hidden" name="amount[]" value= " '.$totalsalary.' " >'.'</td>';
           
            $html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="employee_id[]" value="'.$attend->employee_id.'">'.'
            <input type="checkbox" name="checkmanage[]" id="'.$key.'" value="'.$key.'" '.$checked.'
              style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>'; 
    
        }  // End for each
       return response()->json(@$html);

    } //End of AccountGetEmployee


    public function AccountEmployeeStore(Request $request)
    {
       $date = date('Y-m',strtotime($request->date));
 
       AccountEmpSalary::where('date',$date)->delete();
 
       $checkData = $request->checkmanage;
 
       if ($checkData !=null) {
          for ($i=0; $i <count($checkData) ; $i++) { 
                $data = new AccountEmpSalary();
                $data->date = $date;
                $data->employee_id  = $request->employee_id [$checkData[$i]];
                $data->amount = $request->amount[$checkData[$i]];
                $data->save();
             
          } //end of loop
       } //end of if 
 
       if (!empty(@$data)|| empty($checkData)) {
          $notification = array('message' =>'Waow Data Updated Successfully' ,
          'alert-type'=>'success' );
         return redirect()->route('account.empfee.view')->with($notification);
       }
       else{
 
          $notification = array('message' =>'Sorry Data not Saved' ,
          'alert-type'=>'success' );
         return redirect()->back()->with($notification);
       }

    } //End of AccountEmployeeStore

    
} // End of AccountEmpSalaryController
