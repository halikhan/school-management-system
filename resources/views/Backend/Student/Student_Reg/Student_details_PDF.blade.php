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
        
       <h2><b>ABCD </b> </h2>
        <h4>Sec School</h4>
      </td>
      <td>
      <h2>School ERP</h2> 
      <p>School Address: Karachi, Pakistan</p>
      <p>Phone Number: 0300-999900011</p>
      <p>School Email: abcdschool@gmail.com</p>
    </td>
    </tr>
    
  </table>

<table id="customers">
  <tr>
    <th width="10%">SL</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>

  <tr>
    <td>01</td>
    <td><b>Student Name</b></td>
    <td>{{ $details['student']['name'] }}</td>
  </tr>
  <tr>
    <td>02</td>
    <td><b>Student ID No.</b></td>
    <td>{{ $details['student']['id_no'] }}</td>
  </tr>
  <tr>
    <td>03</td>
    <td><b>Student Roll</b></td>
    <td>{{ $details->roll }}</td>
  </tr>
  <tr>
    <td>04</td>
    <td><b>Father's Name</b></td>
    <td>{{ $details['student']['fname'] }}</td>
  </tr>
  <tr>
    <td>05</td>
    <td><b>Mother's Name</b></td>
    <td>{{ $details['student']['mname'] }}</td>
  </tr>
  <tr>
    <td>06</td>
    <td><b>Mobile Number</b></td>
    <td>{{ $details['student']['mobile'] }}</td>
  </tr>
  <tr>
    <td>07</td>
    <td><b>Address</b></td>
    <td>{{ $details['student']['address'] }}</td>
  </tr>
  <tr>
    <td>08</td>
    <td><b>Gender</b></td>
    <td>{{ $details['student']['gender'] }}</td>
  </tr>

  <tr>
    <td>09</td>
    <td><b>Relegion</b></td>
    <td>{{ $details['student']['relegion'] }}</td>
  </tr>
  <tr>
    <td>10</td>
    <td><b>Date of Birth</b></td>
    <td>{{ $details['student']['dob'] }}</td>
  </tr>
  <tr>
    <td>11</td>
    <td><b>Discount</b></td>
    <td>{{ $details['discount']['discount']}} %</td>
  </tr>
  <tr>
    <td>12</td>
    <td><b>Year </b></td>
    <td>{{ $details['student_year']['name'] }}</td>
  </tr>
  <tr>
    <td>13</td>
    <td><b>Class</b></td>
    <td>{{ $details['student_class']['name'] }}</td>
  </tr>
  <tr>
    <td>14</td>
    <td><b>Group</b></td>
    <td>{{ $details['group']['name'] }}</td>
  </tr>
  <tr>
    <td>15</td>
    <td><b>Shift</b></td>
    <td>{{ $details['shift']['name'] }}</td>
  </tr>
</table>
<br><br>
<i Style="font-size: 10px; float: right;"> Print Date: {{ date("D M Y") }} </i>
</body>
</html>
