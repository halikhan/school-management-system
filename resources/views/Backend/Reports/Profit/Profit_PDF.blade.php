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
      <p>Monthly and Yearly Profit</p>
    </td>
    <td><h5>School Cost</h5> Report</td>
    </tr>
    
  </table> <!-- End of 1st Table -->

  @php
       
  $student_fee = App\Models\AccountStudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');
  $Other_cost = App\Models\AccountOtherCost::whereBetween('date',[$s_date,$e_date])->sum('amount');
  $emp_salary = App\Models\AccountEmpSalary::whereBetween('date',[$start_date,$end_date])->sum('amount');

  $total_cost = $Other_cost+$emp_salary;
  $profit = $student_fee-$total_cost;

  @endphp
 
<table id="customers">
  <tr>
    <td colspan="2" style="text-align: center;">
      <h4>
        Reporting Date: {{  date('d M Y',strtotime($s_date)) }} - {{  date('d M Y',strtotime($e_date)) }}
      </h4>
    </td>
  </tr>
  <tr>
    <td width="50%"><h4>Purpose</h4></td>
    <td width="50%"><h4>Amount</h4></td>
  </tr>
  <tr>
    <td>Student Fee</td>
    <td>{{ $student_fee }}</td>
  </tr>
  <tr>
  <td>Employee Salary</td>
    <td>{{ $emp_salary }}</td>
  </tr>
  <tr>
      <td>Other Cost</td>
    <td>{{ $Other_cost }}</td>
  </tr>
  <tr>
    <td>Total Cost</td>
  <td>{{ $total_cost }}</td>
</tr>
  <tr>
      <td>Profit</td>
    <td>{{ $profit }}</td>
  </tr>
  
</table>
<br>
<i Style="font-size: 10px; float: right;"> Print Date: {{ date("D M Y") }} </i> <!-- End of 1st Table -->
<br>


</body>
</html>
