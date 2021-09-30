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
      <p>Employee Registration Page</p>
    </td>
    </tr>
    
  </table>

<table id="customers">
  <tr>
    <th width="10%">SL</th>
    <th width="45%">Employee Details</th>
    <th width="45%">Employee Data</th>
  </tr>

  <tr>
    <td>01</td>
    <td><b>Employee Name</b></td>
    <td>{{ $details->name }}</td>
  </tr>
  <tr>
    <td>02</td>
    <td><b>Employee ID No</b></td>
    <td>{{ $details->id_no }}</td>
  </tr>
  <tr>
    <td>03</td>
    <td><b>Employee Designation</b></td>
    <td>{{ $details['designation']['name'] }} </td>
  </tr>
  <tr>
    <td>04</td>
    <td><b>Father's Name</b></td>
    <td>{{ $details->fname }}</td>
  </tr>
  <tr>
    <td>05</td>
    <td><b>Mother's Name</b></td>
    <td>{{ $details->mname }}</td>
  </tr>
  <tr>
    <td>06</td>
    <td><b>Mobile Number</b></td>
    <td>{{ $details->mobile }}</td>
  </tr>
  <tr>
    <td>07</td>
    <td><b>Address</b></td>
    <td>{{ $details->address }}</td>
  </tr>
  <tr>
    <td>08</td>
    <td><b>Gender</b></td>
    <td>{{ $details->gender }}</td>
  </tr>

  <tr>
    <td>09</td>
    <td><b>Relegion</b></td>
    <td>{{ $details->relegion }}</td>
  </tr>
  <tr>
    <td>10</td>
    <td><b>Date of Birth</b></td>
    <td>{{ date('d-m-y', strtotime($details->dob)) }}</td>
  </tr>
  
  <tr>
    <td>11</td>
    <td><b>Join Date </b></td>
    <td>{{ date('d-m-y', strtotime($details->join_date))}}</td>
  </tr>
  <tr>
    <td>12</td>
    <td><b>Empoyee Salary</b></td>
    <td>{{ $details->salary }}</td>
  </tr>
</table>
<br><br>
<i Style="font-size: 10px; float: right;"> Print Date: {{ date("D M Y") }} </i>
</body>
</html>
