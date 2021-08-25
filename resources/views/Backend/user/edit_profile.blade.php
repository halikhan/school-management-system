
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
         <h4 class="box-title">Manage Profile</h4>
          </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
          <div class="col">
           <form method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data">
            @csrf
            
            {{--  Row Started --}}
            <div class="row">	
              {{--  col 6 start point --}}
              <div class="col-6">
                <div class="form-group">
                  <h5>User Name<span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="text" name="name" class="form-control"
                     value="{{ $editData->name }}"  required=""></div>

                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
                  <h5>User Email<span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="email" name="email" class="form-control" 
                    value="{{ $editData->email }}" required=""></div>

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
                  <h5>User Mobile<span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="text" name="mobile" class="form-control" 
                    value="{{ $editData->mobile}}" required=""></div>

                </div>
              </div>
              {{-- End of col-6 --}}
              <div class="col-6">
                <div class="form-group">
                  <h5>User Address<span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="text" name="address" class="form-control"
                     value="{{ $editData->address }}" required=""></div>

                </div>
              </div>
            </div>
               {{--  col 6 start point --}}
                 {{--  Row Started --}}
            <div class="row">	
              {{--  col 6 start point --}}
              

              <div class="col-6">
                <div class="form-group">
                  <h5>Select Gender <span class="text-danger">*</span></h5>
                  <div class="controls">
                    <select name="gender" id="gender" required class="form-control">
                      <option value="" selected="" disabled="" >Select Role</option>
                      <option value="Male" {{ ($editData->gender== "Male" ? "selected": "") }}>Male</option>
                      <option value="Female" {{ ($editData->gender == "Female" ? "selected": "") }}>Female</option>
                    
                    </select>
                  </div>
                </div>	
              </div>
          
              {{-- End of col-6 --}}
              <div class="col-6">
                <div class="form-group">
                  <h5>Profile Picture<span class="text-danger">*</span></h5>
                  <div class="controls">
                    <input type="file" id="image" name="image" class="form-control"></div>

                </div>
              

      
                <div class="form-group">
                  <div class="controls">
                    <img src="{{ (!empty($user->image))? 
                      url('upload/user_images/'.$user->image):url('upload/no_image.jpg') }}" id="showImage"
                     style="width:100px; width:100px; border:1px; solid #000000;" >
                  </div>
                </div>
              </div>



            </div>

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



