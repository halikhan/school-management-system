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
      <p><strong>Student Result Report for Year {{ $allData['0']['year']['name'] }}</strong></p>
    </td>
    <td><h5>School Copy</h5></td>
    </tr>
    
  </table> <!-- End of 1st Table -->
  <br>
<table id="customers">
    <thead>
        <tr>
            <th colspan="2">Result of: <strong>{{ $allData['0']['exam_type']['name'] }}</strong> </th> 
        </tr>  
    </thead>
    
</table>
    
		
  <div class="row">
    <div class="col-md-6">
    
        <table id="customers" class="table table-hover table-responsive-md" width="100%" border="1" 
        style="border-color:rgb(241, 233, 233);" cellpadding="1" cellspacing="1">

            @php
                $assign_student = App\Models\AssignStudents::where('year_id',$allMarks['0']->year_id)->
                where('class_id',$allMarks['0']->class_id)->first();

            @endphp
           
            <tbody>
                <tr>
                    <td width="40%">Name</td>
                    <td width="40%">{{ $allMarks['0']['student']['name'] }}</td>
                </tr>
            <tr>
                <td style="width: 40%;">Student ID</td>
                <td  style="width: 40%;">{{ $allMarks['0']['id_no'] }}</td>
            </tr>
            <tr>
                <td width="40%">Roll No</td>
                <td width="40%">{{ $assign_student->roll }}</td>
            </tr>
            
            <tr>
                <td width="40%">Class</td>
                <td width="40%">{{ $allMarks['0']['student_class']['name'] }}</td>
            </tr>
            <tr>
                <td width="40%">Session</td>
                <td width="40%">{{ $allMarks['0']['year']['name'] }}</td>
            </tr>
        </tbody>
        </table>
    </div> <!-- End of 1st col-6 -->
    <br>
    <div class="col-md-6">
        <table id="customers" class="table table-hover table-responsive-md" width="100%" border="1"
         style="border-color:rgb(241, 233, 233);" cellpadding="1" cellspacing="1">

            <thead class="thead-dark">
                <tr>
                    <th>Letter Grade</th>
                    <th> Marks Intervel</th>
                    <th> Grade Point</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $allGrades as $marks )
                    
                <tr>
                    <td width="40%">{{ $marks->grade_name }}</td>
                    <td width="40%">{{ $marks->start_marks }} - {{ $marks->end_marks }}</td>
                    <td width="40%">{{ number_format((float)$marks->grade_point,2) }} - {{ ($marks->grade_point == 5)?
                     number_format((float)$marks->grade_point,2):number_format((float)$marks->grade_point+1,2)
                     -((float)0.01)}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div> <!-- End of 2nd col-6 -->
</div><!-- End of 2nd row -->
<br>
<div class="row"> <!-- 3td row start -->
<div class="col-md-12">

    <table id="customers" class="table table-hover table-responsive-md" width="100%" border="1" 
    style="border-color:rgb(241, 233, 233);" cellpadding="1" cellspacing="1">

    <thead class="thead-dark">
      <tr>
    <th class="text-center">SL</th>
    <th class="text-center">Get Marks</th>
    <th class="text-center">Letter Grade</th>
    <th class="text-center">Grade Point</th>    
      </tr>
</thead>

<tbody>
@php
$total_marks = 0;
$total_point = 0;
@endphp

@foreach($allMarks as $key => $mark)
@php
$get_mark = $mark->marks;
$total_marks = (float)$total_marks+(float)$get_mark;
$total_subject = App\Models\StudentMarks::where('year_id',$mark->year_id)->where
('class_id',$mark->class_id)->where('exam_type_id',$mark->exam_type_id)->
where('student_id',$mark->student_id)->get()->count();
@endphp
<tr>
<td class="text-center">{{ $key+1 }}</td>

<td class="text-center">{{ $get_mark }}</td>

@php
$grade_marks = App\Models\MarksGrade::where([['start_marks','<=', (int)$get_mark],['end_marks', '>=',(int)$get_mark ]])->first();
$grade_name = $grade_marks->grade_name;
$grade_point = number_format((float)$grade_marks->grade_point,2);
$total_point = (float)$total_point+(float)$grade_point;
@endphp
<td class="text-center">{{ $grade_name }}</td>
<td class="text-center">{{ $grade_point }}</td>

</tr>
@endforeach
</tbody>


</table>
<table id="customers">
<tr>
    <td colspan="3"><strong style="padding-left: 30px;">Total Marks</strong></td> 
    <td colspan="3"><strong style="padding-left: 38px;">{{ $total_marks }}</strong></td>
    </tr>
</table>
<br>



<div class="row">  <!--  4th row start -->
  <div class="col-md-12">
  
      <table id="customers" class="table table-hover " width="100%" border="1" style="border-color:rgb(241, 233, 233);" 
      cellpadding="1" cellspacing="1">
          @php
          $total_grade = 0;
          $point_for_letter_grade = (float)$total_point/(float)$total_subject;
          $total_grade = App\Models\MarksGrade::where([['start_point','<=',$point_for_letter_grade],
          ['end_point','>=',$point_for_letter_grade]])->first();
  
          $grade_point_avg = (float)$total_point/(float)$total_subject;
  
          @endphp
          <tr>
            <td width="50%"><strong>Grade Point Average</strong></td>
            <td width="50%"> 
              @if($countfail > 0)
              0.00
              @else
              {{number_format((float)$grade_point_avg,2)}}
              @endif
            </td>
          </tr>
  
          <tr>
            <td width="50%"><strong>Letter Grade </strong></td>
            <td width="50%"> 
              @if($countfail > 0)
              F
              @else
              {{ $total_grade->grade_name }}
              @endif
            </td>
          </tr>
          <tr>
            <td width="50%"> <strong>Total Marks with Fraction</strong> </td>
            <td width="50%"><strong>{{ $total_marks }}</strong></td>
          </tr>
  
                </table>        
                      </div>        
                    </div>   <!--  End 4th row start -->
  
  
          <br>
  
                <div class="row">  <!--  5th row start -->
                  <div class="col-md-12">
  
                      <table id="customers" class="table table-hover" width="100%" border="1" style="border-color:rgb(241, 233, 233);"
                       cellpadding="1" cellspacing="1">
                          <tbody>
                  <tr>
                    <td style="text-align: left;"><strong>Remarks:</strong>
                      @if($countfail > 0)
                      Fail
                      @else
                      <strong>{{ $total_grade->remarks }}</strong>
                      @endif
                    </td>
                  </tr>
  
               </tbody>
                </table>   
                  </div>
                </div>     
                <br>
             

<i Style="font-size: 10px; float: right;"> Print Date: {{ date("d M Y") }} </i> <!-- End of 1st Table -->


</body>
</html>
