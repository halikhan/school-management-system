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
use App\Models\AccountOtherCost;

class OtherCostController extends Controller
{
    
    public function OtherCostView()
    {
       
        $data['allData'] = AccountOtherCost::orderBy('id','desc')->get();
        return view('Backend.Accounts.Other_Cost.OtherCost_view', $data);


    } // End of OtherCostView


    public function OtherCostAdd()
    {
        return view('Backend.Accounts.Other_Cost.OtherCostAdd');

    } // End of OtherCostAdd



    public function OtherCostStore(Request $request)
    {
        $cost = new AccountOtherCost();
        $cost->date = date('Y-m-d',strtotime($request->date)); 
        $cost->amount = $request->amount;

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/cost_images'),$filename);
            $cost['image'] = $filename;
        }
        $cost->description = $request->description;
        $cost->save();
        $notification = array('message' =>'Other Cost inserted Successfully' , 'alert-type'=>'Success' );
        return redirect()->route('other.cost.view')->with($notification);

    } // End of OtherCostStore


    public function OtherCostEdit($id)
    {
       $data['editData'] = AccountOtherCost::find($id);
       return view('Backend.Accounts.Other_Cost.OtherCostEdit',$data);

        

    } // End of OtherCostAdd

    public function OtherCostUpdate(Request $request, $id)
    {
        $cost = AccountOtherCost::find($id);
        $cost->date = date('Y-m-d',strtotime($request->date)); 
        $cost->amount = $request->amount;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/cost_images/'.$cost->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/cost_images'),$filename);
            $cost['image'] = $filename;
        }
        $cost->description = $request->description;
        $cost->save();
        $notification = array('message' =>'Other Cost Updated Successfully' , 'alert-type'=>'Success' );
        return redirect()->route('other.cost.view')->with($notification);

    } // End of OtherCost Add
    
    public function OtherCostDelete($id)
    {
        $cost = AccountOtherCost::find($id);
        $cost->delete();
        return redirect()->route('other.cost.view');

        

    } // End of OtherCostAdd
    

} // End of OtherCostController

