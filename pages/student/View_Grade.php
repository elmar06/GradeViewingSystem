<?php include '../../includes/Student_Header.php'?>
<div class="container">
  <div class="row" style="margin-left: -100px; margin-right: -100px">
    <!--DATATABLE TEACHER CONTENT START-->
    <div class="col-lg-12">
      <div class="container-fluid mb-3 mt-3" >
        <table class="table table-striped mydatatable" style="width: 100%">
          <thead class="thead" style="background-color: green;">
            <tr class="btn-success">
              <th>Subject Code</th>
              <th>Description</th>
              <th><center>Day & Time</center></th>
              <th><center>Midterm</center></th>
              <th><center>Final</center></th>
              <th><center>School Year</center></th>
            </tr>
          </thead>
          <tbody id="grade-list-body">
          <?php
          	//get the enrolled subject
          	$get = mysqli_query($con, "SELECT tblenrolled.student_id, tblenrolled.subj_id, tblenrolled.enroll_sy, tblsubject.subj_code, tblsubject.subj_desc, tblsubject.subj_time, tblsubject.subj_day FROM tblsubject, tblenrolled WHERE tblenrolled.subj_id = tblsubject.subj_id AND tblenrolled.student_id = '$id' ORDER BY tblenrolled.enroll_sy DESC");
          	while($row = mysqli_fetch_array($get))
          	{
          		$sub = $row['subj_id'];//initialize subject id
          		//get the grade of subject per student
          		$grade = mysqli_query($con, "SELECT subj_id, student_id, midterm, final FROM tblgrade WHERE subj_id = '$sub' AND student_id ='$id' AND status != 0");
          		while($row2 = mysqli_fetch_array($grade))
          		{
                if($row2['midterm'] == null){
                  $midterm = '-';
                }else{
                  $midterm = $row2['midterm'];
                }
                if($row2['final'] == null){
                  $final = '-';
                }else{
                  $final = $row2['final'];
                }
          			echo '
          			<tr>
          				<td>'.$row['subj_code'].'</td>
          				<td>'.$row['subj_desc'].'</td>
          				<td><center>'.$row['subj_day'].' || '.$row['subj_time'].'</center></td>
          				<td><center>'.$midterm.'</center></td>
          				<td><center>'.$final.'</center></td>
          				<td><center>'.$row['enroll_sy'].'</center></td>
          			</tr>';
          		}
          	}

          ?>
          </tbody>
        </table>
      </div>
    </div>      
  </div>
</div>
<?php include '../../includes/Student_Footer.php'?>