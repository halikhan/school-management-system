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
    </td>
    <td><h5>School Copy</h5><h6>Exam Fee</h6></td>
    </tr>
    
  </table> <!-- End of 1st Table -->

  @php
        $examfee = App\Models\FeeAmount::where('fee_category_id','3')
        ->where('class_id',$details->class_id)->first();
        $originalfee = $examfee->amount;
        $discount = $details['discount']['discount'];
        $discounttablefee = $discount/100*$originalfee;
        $finalfee = (float)$originalfee-(float)$discounttablefee;

  @endphp

<table id="customers">
  <tr>
    <th width="10%">SL</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>


  <tr>
    <td>01</td>
    <td><b>Student ID No.</b></td>
    <td>{{ $details['student']['id_no'] }}</td>
  </tr>
  <tr>
    <td>02</td>
    <td><b>Student Roll</b></td>
    <td>{{ $details->roll }}</td>
  </tr>
  <tr>
    <td>03</td>
    <td><b>Student Name</b></td>
    <td>{{ $details['student']['name'] }}</td>
  </tr>
  <tr>
    <td>04</td>
    <td><b>Father's Name</b></td>
    <td>{{ $details['student']['fname'] }}</td>
  </tr>
  <tr>
    <td>05</td>
    <td><b>Discount Fee</b></td>
    <td>{{ $discount}}%</td>
  </tr>
  <tr>
    <td>06</td>
    <td><b>Session </b></td>
    <td>{{ $details['student_year']['name'] }}</td>
  </tr>
  <tr>
    <td>07</td>
    <td><b>Class</b></td>
    <td>{{ $details['student_class']['name'] }}</td>
  </tr>
  <tr>
    <td>08</td>
    <td><b>Exam Fee</b></td>
    <td>{{ $originalfee }} pkr</td>
  </tr>
  <tr>
    <td>09</td>
    <td><b>Fee of {{ $exam_type }}</b></td>
    <td>{{ $finalfee }} pkr</td>
  </tr>
</table>
<br>
<i Style="font-size: 10px; float: right;"> Print Date: {{ date("D M Y") }} </i> <!-- End of 1st Table -->

<hr style="border:dashed 2px; width: 95%; color:black; margin-bottom: 10px;"> 


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
  </td>
  <td><h5>Student Copy</h5><h6>Exam Fee</h6></td>
  </tr>
  
</table> <!-- End of 2nd Table -->
<table id="customers">
  <tr>
    <th width="10%">SL</th>
    <th width="45%">Student Details</th>
    <th width="45%">Student Data</th>
  </tr>


  <tr>
    <td>01</td>
    <td><b>Student ID No.</b></td>
    <td>{{ $details['student']['id_no'] }}</td>
  </tr>
  <tr>
    <td>02</td>
    <td><b>Student Roll</b></td>
    <td>{{ $details->roll }}</td>
  </tr>
  <tr>
    <td>03</td>
    <td><b>Student Name</b></td>
    <td>{{ $details['student']['name'] }}</td>
  </tr>
  <tr>
    <td>04</td>
    <td><b>Father's Name</b></td>
    <td>{{ $details['student']['fname'] }}</td>
  </tr>
  <tr>
    <td>05</td>
    <td><b>Discount Fee</b></td>
    <td>{{ $discount}}%</td>
  </tr>
  <tr>
    <td>06</td>
    <td><b>Session </b></td>
    <td>{{ $details['student_year']['name'] }}</td>
  </tr>
  <tr>
    <td>07</td>
    <td><b>Class</b></td>
    <td>{{ $details['student_class']['name'] }}</td>
  </tr>
  <tr>
    <td>08</td>
    <td><b>Exam Fee</b></td>
    <td>{{ $originalfee }} pkr</td>
  </tr>
  <tr>
    <td>09</td>
    <td><b>Fee of {{ $exam_type }}</b></td>
    <td>{{ $finalfee }} pkr</td>
  </tr>
</table>
<br> 
<i Style="font-size: 10px; float: right;"> Print Date: {{ date("D M Y") }} </i> <!-- End of 2nd Table -->

</body>
</html>
