<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:DodgerBlue;;
  color: white;
}
</style>
</head>
<body>

  <table id="customers">
  
    <tr>
      <td>
        <h2><?php $image_path = '/upload/abcd.png'; ?>
          <img src="{{ public_path() . $image_path }}" width="100px" height="80">
       </h2>
       </td>
      <td>
      <h2>School ERP</h2> 
      <p>School Address: Karachi, Pakistan</p>
      <p>Phone Number: 0300-999900011</p>
      <p>School Email: abcdschool@gmail.com</p>
      <p>Employee Monthly Salary</p>
    </td>
    <td><h5>School Copy</h5></td>
    </tr>
    
  </table> <!-- End of 1st Table -->

  @php
       
       $date = date('Y-m',strtotime($details['0']->date));

    if ($date !='') {
    $where[] = ['date','like',$date.'%'];
    }

    $totalattend = App\Models\EmployeeAttendence::with(['user'])->where($where)
            ->where('employee_id',$details['0']->employee_id)->get();
            $salary = (float)$details['0']['user']['salary'];
            $salaryperday = (float)$salary/30;
            $absentcount = count($totalattend->where('attend_status','Absent'));
            $totalsalaryminus =(float)$absentcount*(float)$salaryperday;
            $totalsalary = (float)$salary-(float)$totalsalaryminus;

  @endphp
 
<table id="customers">
  <tr>
    <th width="10%">SL</th>
    <th width="45%">Employee Details</th>
    <th width="45%">Employee Data</th>
  </tr>
  <tr>
    <td>01</td>
    <td><b>Employee Name</b></td>
    <td>{{ $details['0']['user']['name'] }}</td>
  </tr>
  <tr>
    <td>02</td>
    <td><b>Basic Salary</b></td>
    <td>{{ $details['0']['user']['salary'] }}</td>
  </tr>
  <tr>
    <td>03</td>
    <td><b>Absent for this Month</b></td>
    <td>{{$absentcount}}</td>
  </tr>
  <tr>
    <td>04</td>
    <td><b>Month</b></td>
    <td>{{ date('M-Y',strtotime($details['0']->date)) }}</td>
  </tr>
  <tr>
    <td>05</td>
    <td><b>Salary for this Month</b></td>
    <td>{{ $totalsalary}} PKR</td>
  </tr>
  
</table>
<br>
<i Style="font-size: 10px; float: right;"> Print Date: {{ date("D M Y") }} </i> <!-- End of 1st Table -->
<br>
<hr style="border:dashed 2px; width: 95%; color:black; margin-bottom: 10px;"> 
<br>
<br><br>

<table id="customers">
  
  <tr>
    <td>
      <h2><?php $image_path = '/upload/abcd.png'; ?>
        <img src="{{ public_path() . $image_path }}" width="100px" height="80">
     </h2>
     </td>
    <td>
    <h2>School ERP</h2> 
    <p>School Address: Karachi, Pakistan</p>
    <p>Phone Number: 0300-999900011</p>
    <p>School Email: abcdschool@gmail.com</p>
    <p>Employee Monthly Salary</p>
  </td>
  <td><h5>Employee Copy</h5></td>
  </tr>
  
</table> <!-- End of 2nd Table -->
<table id="customers">
  <tr>
    <th width="10%">SL</th>
    <th width="45%">Employee Details</th>
    <th width="45%">Employee Data</th>
  </tr>
  <tr>
    <td>01</td>
    <td><b>Employee Name</b></td>
    <td>{{ $details['0']['user']['name'] }}</td>
  </tr>
  <tr>
    <td>02</td>
    <td><b>Basic Salary</b></td>
    <td>{{ $details['0']['user']['salary'] }}</td>
  </tr>
  <tr>
    <td>03</td>
    <td><b>Absent for this Month</b></td>
    <td>{{$absentcount}}</td>
  </tr>
  <tr>
    <td>04</td>
    <td><b>Month</b></td>
    <td>{{ date('M-Y',strtotime($details['0']->date)) }}</td>
  </tr>
  <tr>
    <td>05</td>
    <td><b>Salary for this Month</b></td>
    <td>{{ $totalsalary}} PKR</td>
  </tr>
  
</table>
<br>
<i Style="font-size: 10px; float: right;"> Print Date: {{ date("D M Y") }} </i> <!-- End of 2nd Table -->

</body>
</html>
