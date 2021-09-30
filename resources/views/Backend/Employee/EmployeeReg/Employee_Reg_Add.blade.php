
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
         <h4 class="box-title">Add Employee </h4>
          </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
          <div class="col">
           <form method="post" action="{{route('store.employee.reg') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="row"> {{--  Row Started --}}
              <div class="col-12">


            <div class="row" >  {{--  1st Row Started --}}

              <div class="col-md-4">

                <div class="form-group">
                  <h5>Employee Name <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input  type="text" name="name" class="form-control" >
                </div>
                </div>

              </div>{{--  1st col-mid-4 Ended --}}

              <div class="col-md-4">

                <div class="form-group">
                  <h5>Father's Name <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input  type="text" name="fname"  class="form-control" >
                </div>
                </div>

              </div>{{--  1st col-mid-4 Ended --}}

              <div class="col-md-4">

                <div class="form-group">
                  <h5>Mother's Name <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input  type="text" name="mname" class="form-control" >
                </div>
                </div>

              </div>{{--  1st col-mid-4 Ended --}}

            </div> {{-- Ended 1st Row  --}}
            

            <div class="row" >  {{--  2nd Row Started --}}

              <div class="col-md-4">

                <div class="form-group">
                  <h5>Mobile Number <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input  type="text" name="mobile" class="form-control" >
                </div>
                </div>

              </div>{{--  2nd col-mid-4 Ended --}}

              <div class="col-md-4">

                <div class="form-group">
                  <h5>Address <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input  type="text" name="address"  class="form-control" >
                </div>
                </div>

              </div>{{--  2nd col-mid-4 Ended --}}

              <div class="col-md-4">

                <div class="form-group">
                  <h5>Gender<span class="text-danger">*</span></h5>
                  <div class="controls">
                
                    <select name="gender" id="gender" required class="form-control">
                      <option value="" selected="" disabled="" >Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                </div>
                </div>

              </div>{{--  2nd col-mid-4 Ended --}}

            </div> {{-- Ended 2nd Row  --}}
           

            <div class="row" >  {{--  4th Row Started --}}

              <div class="col-md-4">

                <div class="form-group">
                  <h5>Relegion<span class="text-danger">*</span></h5>
                  <div class="controls">
                
                    <select name="relegion" id="relegion" required class="form-control">
                      <option value="" selected="" disabled="" >Select Relegion</option>
                      <option value="Muslim">Muslim</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Christan">Christan</option>
                      <option value="Other">Other</option>
                    </select>
                </div>
                </div>

              </div>{{--  3rd col-mid-4 Ended --}}

              <div class="col-md-4">

                <div class="form-group">
                  <h5>Date of Birth <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input  type="date" name="dob" class="form-control" >
                </div>
                </div>

              </div>{{--  3rd col-mid-4 Ended --}}

              <div class="col-md-4">

                <div class="form-group">
                  <h5>Designation<span class="text-danger">*</span></h5>
                  <div class="controls">
                
                    <select name="designation_id" required class="form-control">
                      <option value="" selected="" disabled="" >Select Designation</option>
                        @foreach ($designation as $desig )
                        <option value="{{ $desig->id }}">{{ $desig->name }}</option>
                        @endforeach
                        
                    </select>
                </div>
                </div>
			  </div>

              </div>{{-- Ended 3rd Row  --}}
          

            <div class="row" >  {{--  4th Row Started --}}

				<div class="col-md-3">

					<div class="form-group">
					  <h5>Salary <span class="text-danger">*</span></h5>
					  <div class="controls">
						<input  type="text" name="salary"  class="form-control" >
					</div>
					</div>
	
              </div>{{-- 3th col-mid-4 Ended --}}

              <div class="col-md-3">
                <div class="form-group">
                  <h5>Joining Date<span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input  type="date" name="join_date" class="form-control" >
                </div>
                </div>  
              </div>{{--  3 col-mid-4 Ended --}}

			  <div class="col-md-3">

                <div class="form-group">
                  <h5>Profile Picture<span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="file" id="image" name="image" class="form-control">
                  </div>
                </div>

              </div>{{--  3 col-mid-4 Ended --}}

			  <div class="col-md-3">
				<div class="form-group">
					<div class="controls">
					  <img src="{{ url('upload/no_image.jpg') }}" id="showImage"
					   style="width:100px; width:100px; border:1px; solid #000000;" >
					</div>
				  </div>
               
              </div>{{--  3 col-mid-4 Ended --}}

            </div> {{-- Ended 4th Row  --}}

			
            <div class="text-xs-right">
              <input type="submit" class="btn btn-rounded btn-info" value="Submit">
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


<script type="text/javascript">
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });

</script>

@endsection



