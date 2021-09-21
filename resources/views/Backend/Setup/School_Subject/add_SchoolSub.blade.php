
@extends('admin.admin_master');
@section('admin');



<body class="hold-transition dark-skin sidebar-mini theme-primary">
<div class="wrapper">
  <div class="content-wrapper">
	  




  <section class="content">

      <!-- Basic Forms -->
    <div class="box">
     <div class="box-header with-border">
         <h4 class="box-title">Add School Subjects</h4>
          </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
          <div class="col">
           <form method="post" action="{{route('store.School.Subject') }}" >
            @csrf
            
            {{--  Row Started --}}

      
                <div class="form-group">
                  <h5>Add School Subjects<span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input  type="text" name="name" 
                    class="form-control" >
                    @error('name')
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



