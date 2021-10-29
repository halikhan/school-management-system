<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      <p><strong>Student ID card of: {{ $allData['0']['student_year']['name'] }}</strong></p>
    </td>
    <td><h5>School Copy</h5></td>
    </tr>
    
  </table> <!-- End of 1st Table -->
  <br>
  
  
  @foreach ($allData as $value )
  <table id="customers">
	<tr>
		<td>Image</td>
		<td>ABC School ERP</td>
		<td>Student ID card</td>
	</tr>
	<tr>
	  <td>Name: {{ $value['student']['name'] }}</td>
	  <td>Session: {{ $value['student_year']['name'] }}</td>
	  <td>Class: {{ $value['student_class']['name'] }}</td>
  </tr>
  <tr>
	  <td>Roll: {{ $value->roll}}</td>
	  <td>ID NO: {{ $value['student']['id_no'] }}</td>
	  <td>Mobile: {{ $value['student']['mobile'] }}</td>
  </tr>
</table>
<br>
  @endforeach
<i Style="font-size: 10px; float: right;"> Print Date: {{ date("d M Y") }} </i> <!-- End of 1st Table -->


</body>
</html>
