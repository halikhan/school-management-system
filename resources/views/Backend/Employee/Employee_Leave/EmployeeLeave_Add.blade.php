
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
         <h4 class="box-title">Employee Leave</h4>
          </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
          <div class="col">
           <form method="post" action="{{ route('store.employee.leave') }}">
            @csrf
            
            {{--  Row Started --}}
            <div class="row">
              <div class="col-md-12">


                <div class="row"> {{--  Row Started --}}

                  <div class="col-6"> {{--  col 6 start point --}}
                    <div class="form-group">
                      <h5>Employee Name <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <select name="employee_id" id="role"  class="form-control">
                          <option value="" selected="" disabled="" >Select Employee Name</option> 
                          @foreach ($employees as $employee )
                          <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>	
                  </div>
                  {{-- End of col-6 --}}

                  <div class="col-md-6">
                    <div class="form-group">
                      <h5>Start Date<span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input  type="date" name="start_date" class="form-control">
                    </div>
                    </div>

                  </div>{{-- End of col-6 --}}
                </div>{{--  Row ended --}}

                <div class="row"> {{--  2nd Row Started --}}
                  <div class="col-md-6">
                    <div class="form-group">
                      <h5>leave <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <select name="leave_purpose_id" id="leave_purpose_id"  class="form-control">
                          <option value="" selected="" disabled="" >Select leave Purpose</option> 
                          @foreach ($leave_purpose as $leave )
                          <option value="{{ $leave->id }}">{{ $leave->name }}</option>
                          @endforeach
                          <option value="0">Other Purpose</option>
                        </select>
                        <input type="text" name="name" id="add_another" 
                        class="form-control" placeholder="Write the purpose of leave" style="display:none;">
                      </div>
                    </div>
                  </div>{{-- End of col-6 --}}

                  <div class="col-md-6">

                    <div class="form-group">
                      <h5>End Date<span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input  type="date" name="end_date" class="form-control">
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



<script type="text/javascript">
    $(document).ready(function(){
      $(document).on('change','#leave_purpose_id',function(){
        var leave_purpose_id = $(this).val();
        if(leave_purpose_id == '0'){
          $('#add_another').show();
        }else{
          $('#add_another').hide();
        }
      
      });
    });
</script>

@endsection



