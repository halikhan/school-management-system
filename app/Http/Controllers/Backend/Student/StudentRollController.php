<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudents;
use App\Models\User;
use App\Models\DiscountStudents;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use Illuminate\Support\Facades\DB;
use PDF;


class StudentRollController extends Controller
{
        public function RollGenerateView()
        {
            $data['years'] = StudentYear::all();
            $data['classes'] = StudentClass::all();
            return view('Backend.Student.RollGenerate.Roll_Generate_view',$data);

        } //End of RollGenerateView method

        public function GetStudents(Request $request)
        {
           // dd('Its waowwwww');

           $allData = AssignStudents::with(['student'])->
           where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
           // dd($allData->toArray());
            return response()->json($allData);


        } //End of GetStudents method

        public function RollGenerateStore(Request $request)
        {
            $year_id = $request->year_id;
            $class_id = $request->class_id;
            if ($request->student_id !=null) {
                for ($i=0; $i < count($request->student_id) ; $i++) { 

                    AssignStudents::where('year_id',$year_id)
                    ->where('class_id',$class_id)
                    ->where('student_id',$request->student_id[$i])
                    ->Update(['roll'=> $request->roll[$i]]);

                } //End for loop
            }
            else{

                $notification = array('message' =>'Sorry there is no Student ' ,
                'alert-type'=>'error' );

               return redirect()->back()->with($notification);
       
            } // End of IF Conditions

            $notification = array('message' =>'Waow Student Roll Generated Successfully' ,
            'alert-type'=>'success' );
           return redirect()->route('roll.generate.veiw')->with($notification);
   


        } //End of Store method



}
