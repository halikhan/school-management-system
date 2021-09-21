<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    
    public function VeiwFeeCategory(){
        $data ['allData'] = FeeCategory::all();
        return view('Backend.Setup.Fee_Category.view_FeeCat', $data);

    }

    public function FeeCategoryAdd(){

        return view('Backend.Setup.Fee_Category.add_FeeCat');

    }

    public function FeeCategoryStore(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories,name',

        ]);

        $data = new FeeCategory();
            $data->name = $request->name;
            $data->save();

            $notification = array('message' =>'FeeCategory Inserted Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('Fee.Category.veiw')->with($notification);
    
    
    
    }

    public function FeeCategoryEdit($id){

        $editData = FeeCategory::find($id);
        return view('Backend.Setup.Fee_Category.edit_FeeCat', compact('editData'));
    }

    public function FeeCategoryUpdate(Request $request,$id){
        $data = FeeCategory::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories,name,'.$data->id

        ]);

       
            $data->name = $request->name;
            $data->save();

            $notification = array('message' =>'FeeCategory Updated Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('Fee.Category.veiw')->with($notification);
    
    

    }

    public function FeeCategoryDelete($id){

        $user = FeeCategory::find($id);
        $user->delete();


        $notification = array('message' =>'FeeCategory Deleted Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('Fee.Category.veiw')->with($notification);
    
    }



}
