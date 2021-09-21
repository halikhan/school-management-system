
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
         <h4 class="box-title">Add Student </h4>
          </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
          <div class="col">
           <form method="post" action="{{route('store.student.reg') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="row"> {{--  Row Started --}}
              <div class="col-12">


            <div class="row" >  {{--  1st Row Started --}}

              <div class="col-md-4">

                <div class="form-group">
                  <h5>Student Name <span class="text-danger">*</span></h5>
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
                  <h5>Discount <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input  type="text" name="discount"  class="form-control" >
                </div>
                </div>

              </div>{{--  3rd col-mid-4 Ended --}}

              

            </div> {{-- Ended 3rd Row  --}}
          

            <div class="row" >  {{--  4th Row Started --}}

              <div class="col-md-4">

                <div class="form-group">
                  <h5>Year<span class="text-danger">*</span></h5>
                  <div class="controls">
                
                    <select name="year_id" required class="form-control">
                      <option value="" selected="" disabled="" >Select Year</option>
                        @foreach ($years as $year )
                        <option value="{{ $year->id }}">{{ $year->name }}</option>
                        @endforeach
                        
                    </select>
                </div>
                </div>

              </div>{{--  4th col-mid-4 Ended --}}

              <div class="col-md-4">

                <div class="form-group">
                  <h5>Class<span class="text-danger">*</span></h5>
                  <div class="controls">
                
                    <select name="class_id" required class="form-control">
                      <option value="" selected="" disabled="" >Select Class</option>
                      @foreach ($classes as $class )
                      <option value="{{ $class->id }}">{{ $class->name }}</option>
                      @endforeach
                    </select>
                </div>
                </div>

              </div>{{--  4th col-mid-4 Ended --}}

              <div class="col-md-4">

                <div class="form-group">
                  <h5>Group<span class="text-danger">*</span></h5>
                  <div class="controls">
                
                    <select name="group_id" required class="form-control">
                      <option value="" selected="" disabled="" >Select Group</option>
                      @foreach ($groups as $group )
                      <option value="{{ $group->id }}">{{ $group->name }}</option>
                      @endforeach
                    </select>
                </div>
                </div>

              </div>{{--  4th col-mid-4 Ended --}}
              

            </div> {{-- Ended 4th Row  --}}
          
            <div class="row" >  {{--  5th Row Started --}}

              <div class="col-md-4">

                <div class="form-group">
                  <h5>Shift<span class="text-danger">*</span></h5>
                  <div class="controls">
                
                    <select name="shift_id" required class="form-control">
                      <option value="" selected="" disabled="" >Select Shift</option>
                        @foreach ($shifts as $shift )
                        <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                        @endforeach
                        
                    </select>
                </div>
                </div>

              </div>{{--  5th col-mid-4 Ended --}}

              <div class="col-md-4">

                <div class="form-group">
                  <h5>Profile Picture<span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="file" id="image" name="image" class="form-control">
                  </div>
                </div>

              </div>{{--  5th col-mid-4 Ended --}}

              <div class="col-md-4">

                <div class="form-group">
                  <div class="controls">
                    <img src="{{ url('upload/no_image.jpg') }}" id="showImage"
                     style="width:100px; width:100px; border:1px; solid #000000;" >
                  </div>
                </div>
              </div>{{--  5th col-mid-4 Ended --}}
              

            </div> {{-- Ended 5th Row  --}}

            <div class="text-xs-right">
              <input type="submit" class="btn btn-rounded btn-info" value="Submit">
            </div>
            </div>
      
              {{-- End of col-6 --}}
            </div>
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



