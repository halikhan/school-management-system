
@php 
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp





<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
            <a href="{{ route('dashboard') }}">
               <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
              </a>
						  <h4><a href="{{ route('dashboard') }}"><b>ABCD </b>School </a></h4>
              
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li  class="{{ ($route == 'dashboard')?'active':'' }}">
          <a href="{{ route('dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  

        
        @if (Auth::user()->role =='Admin') 
        <li class="treeview {{ ($prefix== '/users')?'active':'' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Manage User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('user.view') }}"><i class="ti-more"></i>View User</a></li>
            <li><a href="{{ route('user.add') }}"><i class="ti-more"></i>Add User</a></li>
          </ul>
        </li> 
		  @endif
        <li class="treeview {{ ($prefix== '/profile')?'active':'' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('profile.veiw') }}"><i class="ti-more"></i>Your Profile</a></li>
            <li><a href="{{ route('password.veiw') }}"><i class="ti-more"></i>Change Password</a></li>
          </ul>
        </li>
		
        <li class="treeview {{ ($prefix== '/setups')?'active':'' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Setup Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('student.class.veiw') }}"><i class="ti-more"></i>Student Class</a></li>
            <li><a href="{{ route('student.year.veiw') }}"><i class="ti-more"></i>Student Year</a></li>
            <li><a href="{{ route('student.group.veiw') }}"><i class="ti-more"></i>Student Group</a></li>
            <li><a href="{{ route('student.Shift.veiw') }}"><i class="ti-more"></i>Student Shift</a></li>
            <li><a href="{{ route('Fee.Category.veiw') }}"><i class="ti-more"></i>Fee Category</a></li>
            <li><a href="{{ route('Fee.Amount.veiw') }}"><i class="ti-more"></i>Fee Category Amount</a></li>
            <li><a href="{{ route('Exam.Type.veiw') }}"><i class="ti-more"></i>Exam Type</a></li>
            <li><a href="{{ route('School.Subject.veiw') }}"><i class="ti-more"></i>School Subject</a></li>
            <li><a href="{{ route('Assign.Subject.veiw') }}"><i class="ti-more"></i>Assign Subject</a></li>
            <li><a href="{{ route('Designation.veiw') }}"><i class="ti-more"></i>Designation</a></li>

          </ul>
        </li>
        

        <li class="treeview {{ ($prefix== '/students')?'active':'' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Student Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('student.reg.veiw') }}"><i class="ti-more"></i>Student Registration</a></li>
             <li><a href="{{ route('roll.generate.veiw') }}"><i class="ti-more"></i>Roll Generate</a></li>
             <li><a href="{{ route('registration.fee.veiw') }}"><i class="ti-more"></i>Registration Fee</a></li>
             <li><a href="{{ route('monthly.fee.veiw') }}"><i class="ti-more"></i>Monthly Fee</a></li>
             <li><a href="{{ route('exam.fee.veiw') }}"><i class="ti-more"></i>Exam Fee</a></li>
            
          </ul>
        </li>
        
        <li class="treeview {{ ($prefix== '/employees')?'active':'' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Employee Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('employee.reg.veiw') }}"><i class="ti-more"></i>Employee Registration</a></li>
            <li><a href="{{ route('employee.salary.veiw') }}"><i class="ti-more"></i>Employee Salary</a></li>
             
          </ul>
        </li>



        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
            <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
            <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
            <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
         
          </ul>
        </li>
		
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    
	</div>
  </aside>