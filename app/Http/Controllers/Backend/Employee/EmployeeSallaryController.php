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


class EmployeeSallaryController extends Controller
{
    
    public function EmployeeSalaryView()
    {
        
        $data['allData'] = User::where('usertype','employee')->get();
        return view('Backend.Employee.Employee_Salary.EmployeeSalary_view',$data); 

    } //End method

    public function EmployeeSalaryIncrement($id)
    {
       
        $data['editData'] = User::find($id);
        return view('Backend.Employee.Employee_Salary.EmployeeSalary_Increment',$data); 


    }  //End method
    
    public function EmployeeStoretUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $previous_salary = $user->salary;
        $present_salary =  (float)$previous_salary+(float)$request->increment_salary;  
        $user->salary = $present_salary;
        $user->save();

        $salary_Data = new EmployeeSallaryLog();
        $salary_Data->employee_id = $id;
        $salary_Data->previous_salary = $previous_salary;
        $salary_Data->increment_salary = $request->increment_salary;  
        $salary_Data->present_salary = $present_salary;
        $salary_Data->effected_salary = date('Y-m-d',strtotime($request->effected_salary));
        $salary_Data->save();

        $notification = array('message' =>'Increment Salary Updated Successfully' ,
         'alert-type'=>'success' );
        return redirect()->route('employee.salary.veiw')->with($notification);

    }  //End method

    public function EmployeeIncrementDetails($id)
    {
        $data['allData'] = User::where('usertype','employee')->get();
        $data['details'] = User::find($id);
        $data['salary_log'] = EmployeeSallaryLog::where('employee_id', $data['details']->id)->get();
        //dd($data['salary_log']->toArray());
        return view('Backend.Employee.Employee_Salary.EmployeeSalary_IncDetails',$data); 


    }





}  //End main method
