
@extends('admin.admin_master');
@section('admin');
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



 <div class="wrapper">
  <div class="content-wrapper">
    
  <section class="content">

      <!-- Basic Forms -->
    <div class="box">
     <div class="box-header with-border">
         <h4 class="box-title">Edit Assign Subject</h4>
         </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
          <div class="col">
           <form method="post" action="{{route('update.Assign.Subject',$editData[0]->class_id) }}" >
            @csrf
            
            {{--  Row Started --}}
            <div class="row">
            <div class="col-12">
              <div class="add_item">

              <div class="form-group">
              <h5>Class Name <span class="text-danger">*</span></h5>
              <div class="controls">
                <select name="class_id" required="" class="form-control">
                  <option value="" selected="" disabled="" >Select Class</option>

                  @foreach ($Classes as $Class) 
                  <option value="{{ $Class->id }}" {{ ($editData['0']->class_id == $Class->id)? 
                    "selected": "" }} >{{ $Class->name }}</option>
                  @endforeach
                </select>
              </div>
             </div>
               

             @foreach($editData as $edit)  {{--  Foreach Started --}}
             <div class="delete_whole_extra_item_add"  id="delete_whole_extra_item_add"> 
            <div class="row">
             
                <div class="col-md-4">
                   <div class="form-group">
                      <h5>Student Subject <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <select name="subject_id[]" required="" class="form-control">
                          <option value="" selected="" disabled="" >Select Student Subject</option>

                          @foreach ($Subjects as $subject) 
                          <option value="{{ $subject->id }}"  {{ ($editData['0']->subject_id == $subject->id)? 
                            "selected": "" }} >{{ $subject->name }}</option>  
                          @endforeach   
                        </select>
                      </div>
                   </div>{{-- End form group --}}
                 </div> {{-- End col md 5 --}}


                <div class="col-md-2">
                   <div class="form-group">
                     <h5>Full Marks<span class="text-danger">*</span></h5>
                     <div class="controls">
                       <input  type="text" name="full_mark[]" value="{{ $edit->full_mark }}" class="form-control" >
                    </div>
                  </div> {{-- End form group --}}
                </div> {{-- End col md 2 --}}

                <div class="col-md-2">
                  <div class="form-group">
                    <h5>Pass Mark<span class="text-danger">*</span></h5>
                    <div class="controls">
                      <input  type="text" name="pass_mark[]" value="{{ $edit->pass_mark }}" class="form-control" >
                   </div>
                 </div> {{-- End form group --}}
               </div> {{-- End col md 2 --}}

               <div class="col-md-2">
                <div class="form-group">
                  <h5>Subjective Marks<span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input  type="text" name="subjective_mark[]" value="{{ $edit->subjective_mark }}" class="form-control" >
                 </div>
               </div> {{-- End form group --}}
             </div> {{-- End col md 2 --}}

              <div class="col-md-2" style="padding-top: 25px;">
                     <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                     <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span> 
              </div>    {{-- End col md 2 --}}
           </div>  {{-- End row--}}
          </div> {{-- End div of Remove Fa Fa icon --}}
          @endforeach  {{--  End Foreach Started --}}
            </div>  {{-- add item end --}}
            
                   <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-info" value="update ">
                  </div>
                
           </form>
          
          </div>  {{-- End of col --}}		
        </div>	{{--  Row End --}} 
      </div>  <!-- /.box-header -->
     </div>  <!-- /.box-body -->
    
  </section>
</div>  <!-- /content-wrapper -->
</div>   <!--wrapper -->
    





<div style="visibility: hidden;">
  <div class="whole_extra_item_add" id="whole_extra_item_add" >
    <div class="delete_whole_extra_item_add"  id="delete_whole_extra_item_add">
      <div class="" id="form-row">
        <div class="row">
       
          <div class="col-md-4">
            <div class="form-group">
               <h5>Student Subject <span class="text-danger">*</span></h5>
               <div class="controls">
                 <select name="subject_id[]" required="" class="form-control">
                   <option value="" selected="" disabled="" >Select Student Subject</option>
                   @foreach ($Subjects as $Subject) 
                   <option value="{{ $Subject->id }}">{{ $Subject->name }}</option>  
                   @endforeach
                 </select>
               </div>
            </div>{{-- End form group --}}
          </div> {{-- End col md 5 --}}


         <div class="col-md-2">
            <div class="form-group">
              <h5>Full Marks<span class="text-danger">*</span></h5>
              <div class="controls">
                <input  type="text" name="full_mark[]" class="form-control" >
             </div>
           </div> {{-- End form group --}}
         </div> {{-- End col md 2 --}}

         <div class="col-md-2">
           <div class="form-group">
             <h5>Pass Mark<span class="text-danger">*</span></h5>
             <div class="controls">
               <input  type="text" name="pass_mark[]" class="form-control" >
            </div>
          </div> {{-- End form group --}}
        </div> {{-- End col md 2 --}}

        <div class="col-md-2">
         <div class="form-group">
           <h5>Subjective Marks<span class="text-danger">*</span></h5>
           <div class="controls">
             <input  type="text" name="subjective_mark[]" class="form-control" >
          </div>
        </div> {{-- End form group --}}
      </div> {{-- End col md 2 --}}

      <div class="col-md-2" style="padding-top: 25px;">
         <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
         <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
      </div>    {{-- End col md 2 --}}
          </div>
      
      </div>
   </div>
  </div>
</div>




<script type="text/javascript">
  $(document).ready(function(){
    var counter = 0;
    $(document).on("click",".addeventmore",function(){
      var whole_extra_item_add = $('#whole_extra_item_add').html();
      $(this).closest(".add_item").append(whole_extra_item_add);
      counter++;
    });
    $(document).on("click",'.removeeventmore',function(event){
      $(this).closest(".delete_whole_extra_item_add").remove();
      counter -= 1
    });

  });
</script>



@endsection



