<?php include '../../includes/Dean_Header.php'?>
<div class="container">
  <div class="row" style="margin-left: -100px; margin-right: -100px">
    <!--DATATABLE TEACHER CONTENT START-->
    <div class="col-lg-12">
      <div class="container-fluid mb-3 mt-3" >
        <table class="table table-striped mydatatable" style="width: 100%">
          <thead class="thead" style="background-color: green;">
            <tr class="btn-success">
              <th>Student ID</th>
              <th>Student Name</th>
              <th>Subject</th>
              <th>Day & Time</th>
              <th>Semester</th>
              <th><center>School Year</center></th>
              <th><center>Midterm</center></th>
              <th><center>Final</center></th>
              <th><center>Action</center></th>
            </tr>
          </thead>
          <tbody id="grade-list-body">
          <?php 
              //get the subject assign in teacher
              $get_subject = mysqli_query($con,  "SELECT tblsubject.subj_id, tblsubject.subj_code, tblsubject.subj_day, tblsubject.subj_time, tblsubject.subj_sy, tblassign.subj_id FROM tblsubject, tblassign WHERE tblsubject.subj_id = tblassign.subj_id AND tblassign.teacher_id = '$id' AND tblassign.status != 0");
              while ($row = mysqli_fetch_array($get_subject)) 
              {
                $subject = $row['subj_id'];
                //get all the student enrolled in subject
                $get_assign = mysqli_query($con, "SELECT tblstudent.std_no_id, CONCAT(tblstudent.std_fn, ' ', tblstudent.std_ln) as 'student-name', tblenrolled.id, tblenrolled.subj_id, tblenrolled.semester, tblgrade.id as 'grade-id', tblgrade.student_id, tblgrade.midterm, tblgrade.final FROM tblstudent, tblgrade, tblenrolled WHERE tblgrade.id = tblenrolled.id AND tblstudent.id = tblenrolled.student_id AND tblenrolled.subj_id = '$subject'");
                while($row2 = mysqli_fetch_array($get_assign))
                {
                  if($row2['midterm'] == null)//check the midterm grade if empty or null
                  {
                    $midterm = '-';
                  }else{
                    $midterm = $row2['midterm'];
                  }

                  if($row2['final'] == null)//check the final grade if empty or null
                  {
                    $final = '-';
                  }else{
                    $final = $row2['final'];
                  }
                  echo 
                    '<tr>
                      <td>'.$row2['std_no_id'].'</td>
                      <td>'.$row2['student-name'].'</td>
                      <td>'.$row['subj_code'].'</td>
                      <td>'.$row['subj_day'].' || '.$row['subj_time'].'</td>
                      <td>'.$row2['semester'].'</td>
                      <td><center>'.$row['subj_sy'].'</center></td>
                      <td><center>'.$midterm.'</center></td>
                      <td><center>'.$final.'</center></td>
                      <td><center><a class="add_grade" href="#" value="'.$row2['grade-id'].'"><i class="fas fa-edit edit"></i> Add Grade</a></center></td>
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

<!-- Student Grade Modal -->
<div class="modal fade" id="gradeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student Grade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body grade-body">
        <!-- details will be displayed in here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="save_grade()">Save</button>
      </div>
    </div>
  </div>
</div>
<?php include '../../includes/Dean_Footer.php'?>