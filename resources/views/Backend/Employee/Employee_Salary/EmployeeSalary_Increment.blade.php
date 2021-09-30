
@extends('admin.admin_master');
@section('admin');



<body class="hold-transition dark-skin sidebar-mini theme-primary">
<div class="wrapper">
  <div class="content-wrapper">
	  




  <section class="content">

      <!-- Basic Forms -->
    <div class="box">
     <div class="box-header with-border">
         <h4 class="box-title">Add Employee Salary Increment</h4>
          </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
          <div class="col">
           <form method="post" action="{{route('update.store.increment', $editData->id) }}" >
            @csrf
            
            {{--  Row Started --}}
            <div class="row">
              <div class="col-md-12">


                <div class="row"> {{--  Row Started --}}
                  <div class="col-md-6">

                    <div class="form-group">
                      <h5>Increment Salary Amount<span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input  type="text" name="increment_salary" 
                        class="form-control" >
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    </div>

                  </div>{{-- End of col-6 --}}

                  <div class="col-md-6">

                    <div class="form-group">
                      <h5>Effected Date<span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input  type="date" name="effected_salary" 
                        class="form-control" >
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    </div>

                  </div>{{-- End of col-6 --}}

                </div>{{--  Row ended --}}


            <div class="text-xs-right">
              <input type="submit" class="btn btn-rounded btn-info" value="Submit">
            </div>
            

              </div>{{-- End of col-12 --}}
            </div>{{--  Row End --}}  
              
              			
                    
           </form>
          </div>
         </div>
       </div>
     </section>
    
    
    </div>
  </div>
</body>


@endsection



