<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use App\Models\FeeAmount;

class FeeAmountController extends Controller
{
    public function VeiwFeeAmount(){
        //$data ['allData'] = FeeAmount::all();

        $data ['allData'] = FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('Backend.Setup.Fee_Amount.view_FeeAmount', $data);

    }


    public function FeeAmountAdd(){

        $data['Fee_categories'] = FeeCategory::all();
        $data['Classes'] = StudentClass::all();
        return view('Backend.Setup.Fee_Amount.add_FeeAmount',$data);

    }

    public function FeeAmountStore(Request $request){

        $countclass = count($request->class_id);
        if ($countclass != null) {
            
            for ($i=0; $i <$countclass ; $i++) { 
                
                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
                
            } #End of Loop
            
        } #End of if cond

              $notification = array('message' =>'Fee Amount Inserted Successfully ' , 'alert-type'=>'success' );
              return redirect()->route('Fee.Amount.veiw')->with($notification);
      
    
    
    }

    public function FeeAmountEdit($fee_category_id){

        $data ['editData'] = FeeAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
        // dd( $data ['editData']->toArray());

        $data['Fee_categories'] = FeeCategory::all();
        $data['Classes'] = StudentClass::all();
        return view('Backend.Setup.Fee_Amount.edit_FeeAmount',$data);

    }

    public function FeeAmountUpdate(Request $request,$fee_category_id){
       
        if ($request->class_id == NULL) {
            
            $notification = array('message' =>'Kindly Select Fee Amount First ' , 'alert-type'=>'error' );
              return redirect()->route('Fee.Amount.edit',$fee_category_id)->with($notification);
      

        }
        else
        {
            $countclass = count($request->class_id);
           
            FeeAmount::where('fee_category_id',$fee_category_id)->delete();
                for ($i=0; $i <$countclass ; $i++) { 
                    
                    $fee_amount = new FeeAmount();
                    $fee_amount->fee_category_id = $request->fee_category_id;
                    $fee_amount->class_id = $request->class_id[$i];
                    $fee_amount->amount = $request->amount[$i];
                    $fee_amount->save();
                    
                } #End of Loop
                
           
        } // End of Else

        $notification = array('message' =>'Fee Amount Updated Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('Fee.Amount.veiw')->with($notification);

    } // end of Method



    public function FeeAmountDetails($fee_category_id){

        $data ['detailsData'] = FeeAmount::where('fee_category_id',
        $fee_category_id)->orderBy('class_id','asc')->get();
       
        return view('Backend.Setup.Fee_Amount.details_FeeAmount',$data);


    }










}
