
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
         <h4 class="box-title">Add Employee Attendence</h4>
          </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
          <div class="col">
           <form method="post" action="{{ route('store.employee.attendence') }}">
            @csrf
            
            {{--  Row Started --}}
            <div class="row">
              <div class="col-md-12">


                <div class="row"> {{--  Row Started --}}


                  <div class="col-md-6">
                    <div class="form-group">
                      <h5>Start Date<span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input  type="date" name="date" class="form-control">
                    </div>
                    </div>

                  </div>{{-- End of col-6 --}}
                </div>{{--  Row ended --}}

                <div class="row"> {{--  2nd Row Started --}}
                  <div class="col-md-12">
                   
                    <table class="table table-bordered table-striped" style="width: 100%">
                      <thead>
                        <tr>
                          <th rowspan="2" width="20%" class="text-center">SL</th>
                          <th rowspan="2" width="55%" class="text-center">Employee List</th>
                         <th colspan="3" width="35%" class="text-center">Attend Status</th>
                        </tr>

                        <tr>
                          <th class="text-center btn present_all" style="display:table-cell; background:rgb(43, 59, 233);">Present</th>
                          <th class="text-center btn leave_all" style="display:table-cell; background:rgb(43, 59, 233);">Leave</th>
                          <th class="text-center btn absent_all" style="display:table-cell; background:rgb(43, 59, 233);">Absent</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($employees as $key=> $employee)
                        <tr id="dive{{ $employee->id }}" class="text-center">
                          <input type="hidden" name="employee_id[]" value="{{ $employee->id }}">
                          <td>{{ $key+1 }}</td>
                          <td>{{ $employee->name }}</td>
                          <td colspan="3" >
                            <div class="switch-toggle switch-3 switch-candy">
                                 <input name="attend_status{{ $key }}" value="Present" type="radio" id="Present{{ $key }}" checked="checked">
                                 <label for="Present{{ $key }}">Present</label>

                                 <input name="attend_status{{ $key }}" value="Leave"  type="radio"  id="Leave{{ $key }}">
                                 <label for="Leave{{ $key }}">Leave</label>

                                 <input name="attend_status{{ $key }}" value="Absent" type="radio"  id="Absent{{ $key }}">
                                 <label for="Absent{{ $key }}">Absent</label>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    
                    

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



