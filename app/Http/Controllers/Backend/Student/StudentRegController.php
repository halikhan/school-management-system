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
use niklasravnsborg\LaravelPdf\Facades\Pdf as FacadesPdf;



class StudentRegController extends Controller
{
   
    public function StudentRegView(){

        
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        $data['year_id'] = StudentYear::orderBy('id','desc')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id','desc')->first()->id;
        // dd($data['class_id']);
        $data['allData'] = AssignStudents::where('year_id',$data['year_id'])->
        where('class_id', $data['class_id'])->get();
        return view('Backend.Student.Student_Reg.Student_view',$data);
    }


    public function StudentYearclasswise(Request $request){

        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        $data['year_id'] = $request->year_id;
        $data['class_id'] = $request->class_id;
        $data['allData'] = AssignStudents::where('year_id',$request->year_id)->
        where('class_id', $request->class_id)->get();
        return view('Backend.Student.Student_Reg.Student_view',$data);

    }


    public function StudentRegAdd(){

        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();

        return view('Backend.Student.Student_Reg.Student_add',$data);
    }




    
    public function StudentRegStore(Request $request){

        DB::transaction(function () use($request) {
            
            $checkYear = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype','Student')->orderBy('id','DESC')->first();

            if ( $student == null) {
                $firstReg = 0;
                $studentId = $firstReg+1;
                if ($studentId < 10) {
                    $id_no = '000'. $studentId;
                }
                elseif($studentId < 100) {
                    $id_no = '00'. $studentId;
                }
                elseif($studentId < 1000) {
                    $id_no = '0'. $studentId;
                }
            }else{
                $student = User::where('usertype','Student')->orderBy('id','DESC')->first()->id;
                $studentId =  $student+1; 
                if ($studentId < 10) {
                    $id_no = '000'. $studentId;
                }
                elseif($studentId < 100) {
                    $id_no = '00'. $studentId;
                }
                elseif($studentId < 1000) {
                    $id_no = '0'. $studentId;
                }

            } //End of Else


            $final_id_no = $checkYear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no; 
            $user->password = bcrypt( $code);
            $user->usertype = 'Student';
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->relegion = $request->relegion;
            $user->dob = date('y-m-d',strtotime($request->dob));
            
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'),$filename);
                $user ['image'] = $filename;
            }
            $user->save();

                $assign_student = new AssignStudents();
                $assign_student->student_id = $user->id;
                $assign_student->year_id = $request->year_id;
                $assign_student->class_id = $request->class_id;
                $assign_student->group_id = $request->group_id;
                $assign_student->shift_id = $request->shift_id;
                $assign_student->save();

                $discount_student = new DiscountStudents();
                $discount_student->assign_student_id = $assign_student->id;
                $discount_student->fee_category_id = '1';
                $discount_student->discount = $request->discount;
                $discount_student->save();


        }); 

        $notification = array('message' =>'student Registration Inserted Successfully' ,
         'alert-type'=>'success' );
        return redirect()->route('student.reg.veiw')->with($notification);


    } //End Method


    public function StudentRegEdit($student_id)
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        $data['editData'] = AssignStudents::with(['student','discount'])->
        where('student_id',$student_id)->first();
       // dd( $data['editData']->toArray());
        return view('Backend.Student.Student_Reg.Student_edit',$data); 
    }
    
    public function StudentRegUpdate(Request $request,$student_id){

        DB::transaction(function () use($request,$student_id) {
           
            $user = User::where('id',$student_id)->first();
            $user->name = $request->name; 
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->relegion = $request->relegion;
            $user->dob = date('y-m-d',strtotime($request->dob));
            
            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/student_images/'.$user->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'),$filename);
                $user ['image'] = $filename;
            }
            $user->save();

                $assign_student = AssignStudents::where('id', $request->id)->
                where('student_id',$student_id)->first();
                $assign_student->year_id = $request->year_id;
                $assign_student->class_id = $request->class_id;
                $assign_student->group_id = $request->group_id;
                $assign_student->shift_id = $request->shift_id;
                $assign_student->save();

                $discount_student = DiscountStudents::where('assign_student_id', $request->id)->first();
                $discount_student->discount = $request->discount;
                $discount_student->save();


        }); 

        $notification = array('message' =>'student Registration Updated Successfully' ,
         'alert-type'=>'success' );
        return redirect()->route('student.reg.veiw')->with($notification);

        


    } //End Method

    public function StudentRegPromotion($student_id)
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        $data['editData'] = AssignStudents::with(['student','discount'])->
        where('student_id',$student_id)->first();
       // dd( $data['editData']->toArray());
        return view('Backend.Student.Student_Reg.Student_promotion',$data); 


    } //End Method




    public function StudentPromotionUpdate(Request $request,$student_id){

        DB::transaction(function () use($request,$student_id) {
           
            $user = User::where('id',$student_id)->first();
            $user->name = $request->name; 
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->relegion = $request->relegion;
            $user->dob = date('y-m-d',strtotime($request->dob));
            
            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/student_images/'.$user->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'),$filename);
                $user ['image'] = $filename;
            }
            $user->save();

                $assign_student = new AssignStudents();
                $assign_student->student_id = $student_id;
                $assign_student->year_id = $request->year_id;
                $assign_student->class_id = $request->class_id;
                $assign_student->group_id = $request->group_id;
                $assign_student->shift_id = $request->shift_id;
                $assign_student->save();

                
                $discount_student = new DiscountStudents();
                $discount_student->assign_student_id = $assign_student->id;
                $discount_student->fee_category_id = '1';
                $discount_student->discount = $request->discount;
                $discount_student->save();


        }); 

        $notification = array('message' =>'student Promotion Updated Successfully' ,
         'alert-type'=>'success' );
        return redirect()->route('student.reg.veiw')->with($notification);

        


    } //End Method


    public function StudentRegDetails($student_id)
    {
        $data['details'] = AssignStudents::with(['student','discount'])->
        where('student_id',$student_id)->first();
        $pdf = FacadesPdf::loadView('Backend.Student.Student_Reg.Student_details_PDF', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');

    }

   







}
