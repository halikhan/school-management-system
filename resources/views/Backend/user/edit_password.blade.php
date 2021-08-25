
@extends('admin.admin_master');
@section('admin');



<body class="hold-transition dark-skin sidebar-mini theme-primary">
<div class="wrapper">
  <div class="content-wrapper">
	  




  <section class="content">

      <!-- Basic Forms -->
    <div class="box">
     <div class="box-header with-border">
         <h4 class="box-title">Edit Password</h4>
          </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
          <div class="col">
           <form method="post" action="{{route('password.update') }}" >
            @csrf
            
            {{--  Row Started --}}

      
                <div class="form-group">
                  <h5>Current Password<span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input id="current_password" type="password" name="oldpassword" 
                    class="form-control" >
                    @error('oldpassword')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                </div>
         
                <div class="form-group">
                  <h5>New Password<span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input id="password" type="password" name="password"  class="form-control">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
              </div>
           
              <div class="form-group">
                <h5>Confirm Password<span class="text-danger">*</span></h5>
                <div class="controls">
                  <input id="password_confirmation" type="password" name="Confirmpassword" class="form-control">
                  @error('Confirmpassword')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
                </div>
            </div>

            <div class="text-xs-right">
              <input type="submit" class="btn btn-rounded btn-info" value="Submit">
            </div>
            </div>
      
              {{-- End of col-6 --}}
              			{{--  Row End --}}  
                    
           </form>
          </div>
         </div>
       </div>
     </section>
    
    
    </div>
  </div>
</body>


@endsection



