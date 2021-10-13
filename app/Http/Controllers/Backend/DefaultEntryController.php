<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AssignStudents;

use App\Models\User;
use App\Models\DiscountStudents;
use App\Models\FeeAmount;
use App\Models\StudentYear;
use App\Models\StudentClass;

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
use App\Models\StudentMarks;
use App\Models\AssignSubject;
use App\Models\ExamType;


class DefaultEntryController extends Controller
{
    public function GetSubjects(Request $request)
    {
        $class_id = $request->class_id;
        $allData = AssignSubject::with(['school_subject'])->where('class_id',$class_id)->get();  
        return response()->json($allData);

    }

    public function GetStudentsMarks(Request $request)
    {
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $allData = AssignStudents::with(['student'])->where('year_id',$year_id)->where('class_id',$class_id)->get();  
        return response()->json($allData);


    } // End of GetStudentsMarks





} // End of DefaultEntryController
