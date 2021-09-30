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


class EmployeeRegController extends Controller
{
   
    public function EmployeeRegView()
    {
        $data['allData'] = User::where('usertype','Employee')->get();
        return view('Backend.Employee.EmployeeReg.Employee_Reg_view',$data);   


    }//End Method

    public function EmployeeRegAdd()
    {
        $data['designation'] = Designation::all();
        return view('Backend.Employee.EmployeeReg.Employee_Reg_Add',$data);   


    }//End Method

    public function EmployeeRegStore(Request $request){

        DB::transaction(function () use($request) {
            
            $checkYear = date('ym',strtotime($request->join_date));
            //dd($checkYear );
            $employee = User::where('usertype','employee')->orderBy('id','DESC')->first();

            if ( $employee == null) {
                $firstReg = 0;
                $employeeId = $firstReg+1;
                if ($employeeId < 10) {
                    $id_no = '000'. $employeeId;
                }
                elseif($employeeId < 100) {
                    $id_no = '00'. $employeeId;
                }
                elseif($employeeId < 1000) {
                    $id_no = '0'. $employeeId;
                }
            }else{
                $employee = User::where('usertype','employee')->orderBy('id','DESC')->first()->id;
                $employeeId =  $employee+1; 
                if ($employeeId < 10) {
                    $id_no = '000'. $employeeId;
                }
                elseif($employeeId < 100) {
                    $id_no = '00'. $employeeId;
                }
                elseif($employeeId < 1000) {
                    $id_no = '0'. $employeeId;
                }

            } //End of Else


            $final_id_no = $checkYear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no; 
            $user->password = bcrypt( $code);
            $user->usertype = 'employee';
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->relegion = $request->relegion;
            $user->salary = $request->salary;
            $user->designation_id = $request->designation_id;
            $user->dob = date('y-m-d',strtotime($request->dob));
            $user->join_date = date('y-m-d',strtotime($request->join_date));
            
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employee_images'),$filename);
                $user ['image'] = $filename;
            }
            $user->save();

                $employee_salary = new EmployeeSallaryLog();
                $employee_salary->employee_id = $user->id;
                $employee_salary->previous_salary = $request->salary;
                $employee_salary->present_salary = $request->salary;
                $employee_salary->increment_salary = '0';
                $employee_salary->effected_salary =date('y-m-d',strtotime($request->join_date));
                $employee_salary->save();

        }); 

        $notification = array('message' =>'employee Registration Inserted Successfully' ,
         'alert-type'=>'success' );
        return redirect()->route('employee.reg.veiw')->with($notification);

    } //End Method




    public function EmployeeRegEdit($id)
    {
        $data['editData'] = User::find($id);
        $data['designation'] = Designation::all();
       // dd( $data['editData']->toArray());
       return view('Backend.Employee.EmployeeReg.Employee_Reg_Edit',$data);   
    } //End Method
    


    public function EmployeeRegUpdate(Request $request, $id)
    {  
            $user = User::find($id);
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->relegion = $request->relegion;
            $user->designation_id = $request->designation_id;
            $user->dob = date('y-m-d',strtotime($request->dob));

            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/employee_images/'.$user->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employee_images'),$filename);
                $user ['image'] = $filename;
            }
            $user->save();

        $notification = array('message' =>'employee Updated Successfully' ,
         'alert-type'=>'success' );
        return redirect()->route('employee.reg.veiw')->with($notification);

    } //End Method

    public function EmployeeRegDetails($id)
    {
        $data['details'] = User::find($id);

        $pdf = FacadesPdf::loadView('Backend.Employee.EmployeeReg.Employee_details_PDF',$data); 
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

    }  //End Method






}
