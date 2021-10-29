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
      <p><strong>Employee Attendence Report</strong></p>
    </td>
    <td><h5>School Copy</h5></td>
    </tr>
    
  </table> <!-- End of 1st Table -->
 
<table id="customers">
    <tr>
        <td colspan="2">Employee Name: <strong>{{ $allData['0']['user']['name'] }}</strong>&nbsp;&nbsp; &nbsp;&nbsp;
             ID: <strong>{{ $allData['0']['user']['id_no'] }}</strong>&nbsp;&nbsp;&nbsp;&nbsp;
              Month: <strong>{{ $month }}</strong>
        </td> 
    </tr>
  <tr>
      
    <td width="50%"><h4>Date</h4></td>
    <td width="50%"><h4>Attendence Status </h4></td>
  </tr>
  
  @foreach ($allData as $value )
      
  <tr>
    <td width="50%"><h4>{{ date('d-m-Y', strtotime($value->date)) }}</h4></td>
    <td width="50%"><h4>{{ $value->attend_status }}</h4></td>
  </tr>

  @endforeach
  <tr>
    <td colspan="2">Total Absents: <strong>{{$Absents}}</strong>&nbsp;&nbsp;
        Total Leaves: <strong>{{$Leaves}}</strong>
    </td> 
</tr>

</table>
<br>
<i Style="font-size: 10px; float: right;"> Print Date: {{ date("d M Y") }} </i> <!-- End of 1st Table -->
<br>


</body>
</html>
