
@extends('admin.admin_master');
@section('admin');

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body class="hold-transition dark-skin sidebar-mini theme-primary">
<div class="wrapper">
  <div class="content-wrapper">
	  




  <section class="content">

      <!-- Basic Forms -->
    <div class="box">
     <div class="box-header with-border">
         <h4 class="box-title">Edit Grade Marks </h4>
          </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
          <div class="col">
           <form method="post" action="{{route('update.marks.grade',$editData->id) }}" enctype="multipart/form-data">
            @csrf
            
            <div class="row"> {{--  Row Started --}}
              <div class="col-12">


            <div class="row" >  {{--  1st Row Started --}}

              <div class="col-md-4">

                <div class="form-group">
                  <h5>Grade Name <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input  type="text" name="grade_name" required=""  value="{{ $editData->grade_name }}" class="form-control" >
                </div>
                </div>

              </div>{{--  1st col-mid-4 Ended --}}

              <div class="col-md-4">

                <div class="form-group">
                  <h5>Grade Point <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input  type="text" name="grade_point" required=""  value="{{ $editData->grade_point }}" class="form-control" >
                </div>
                </div>

              </div>{{--  1st col-mid-4 Ended --}}

              <div class="col-md-4">

                <div class="form-group">
                  <h5>Start Marks <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input  type="text" name="start_marks" required=""  value="{{ $editData->start_marks }}" class="form-control" >
                </div>
                </div>

              </div>{{--  2nd col-mid-4 Ended --}}

            </div> {{-- Ended 1st Row  --}}
            

            <div class="row" >  {{--  2nd Row Started --}}


              <div class="col-md-4">

                <div class="form-group">
                  <h5>End Marks <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input  type="text" name="end_marks" required=""  value="{{ $editData->end_marks }}" class="form-control" >
                </div>
                </div>

              </div>{{--  2nd col-mid-4 Ended --}}
			  
              <div class="col-md-4">

                <div class="form-group">
                  <h5>Start Point <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input  type="text" name="start_point" required=""  value="{{ $editData->start_point }}" class="form-control">
                </div>
                </div>

              </div>{{--  2nd col-mid-4 Ended --}}

			  <div class="col-md-4">

				<div class="form-group">
				  <h5>End Point <span class="text-danger">*</span></h5>
				  <div class="controls">
					<input  type="text" name="end_point" required=""  value="{{ $editData->end_point }}" class="form-control">
				</div>
				</div>

			  </div>{{--  2nd col-mid-4 Ended --}}


            </div> {{-- Ended 2nd Row  --}}
           

            <div class="row" >  {{--  4th Row Started --}}

				

				  <div class="col-md-4">

					<div class="form-group">
					  <h5>Remarks <span class="text-danger">*</span></h5>
					  <div class="controls">
						<input  type="text" name="remarks" required=""  value="{{ $editData->remarks }}" class="form-control" >
					</div>
					</div>
	
				  </div>{{--  2nd col-mid-4 Ended --}}


            </div> {{-- Ended 4th Row  --}}

			
            <div class="text-xs-right">
              <input type="submit" class="btn btn-rounded btn-info" value="Update">
            </div>
        
      
             
            </div>  {{-- End of col-12 --}}
          </div> {{--  Row End --}}        
                    
           </form>
          </div>
         </div>
       </div>
     </section>
    
    
    </div>
  </div>
</body>


@endsection



