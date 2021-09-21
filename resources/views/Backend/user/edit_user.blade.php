
@extends('admin.admin_master');
@section('admin');



<body class="hold-transition dark-skin sidebar-mini theme-primary">
<div class="wrapper">
  <div class="content-wrapper">
	  




  <section class="content">

      <!-- Basic Forms -->
    <div class="box">
     <div class="box-header with-border">
         <h4 class="box-title">Update User</h4>
          </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
          <div class="col">
           <form method="post" action="{{ route('user.update',$editData->id) }}" >
            @csrf
            
            {{--  Row Started --}}
            <div class="row">	
              {{--  col 6 start point --}}
              <div class="col-6">
                <div class="form-group">
                  <h5>User Role <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <select name="role" id="role" required class="form-control">
                      <option value="" selected="" disabled="" >Select Role</option>
                      <option value="Admin" {{ ($editData->role == "Admin" ? "selected": "") }}>Admin</option>
                      <option value="Operator" {{ ($editData->role == "Operator" ? "selected": "") }}>	
                        Operator</option>
                    
                    </select>
                  </div>
                </div>	
              </div>
              {{-- End of col-6 --}}

              {{--  col 6 start point --}}
              <div class="col-6">
                <div class="form-group">
                  <h5>User Name<span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="text" name="name" class="form-control" value="{{ $editData->name }}"  required=""></div>

                </div>
              </div>
            </div>
              {{-- End of col-6 --}}
              			{{--  Row End --}}  

              {{--  Row Started --}}
            <div class="row">	
              {{--  col 6 start point --}}
              <div class="col-6">
                <div class="form-group">
                  <h5>User email<span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="email" name="email" class="form-control" value="{{ $editData->email }}" required=""></div>

                </div>
              </div>
              {{-- End of col-6 --}}
               {{--  col 6 start point --}}
              <div class="col-6">
                
            </div> 
            <div class="text-xs-right">
              <input type="submit" class="btn btn-rounded btn-info" value="Update">
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



