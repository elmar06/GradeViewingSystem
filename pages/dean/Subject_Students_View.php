<?php include '../../includes/Dean_Header.php';

$subj_id = $_GET['subj_id'];//subject id
$teacher_id = $_GET['teacher_id'];//teacher id
//get the subject code and description
$get = mysqli_query($con, "SELECT subj_code, subj_desc FROM tblsubject WHERE subj_id = '$subj_id'");
while($row = mysqli_fetch_array($get))
{
  $subject = $row['subj_code'].' ('.$row['subj_desc'].')';
}
?>
<div class="container">
 <div style="margin-left: -110px;"><br>
    <h4 style="color: blue;"><b> <?php echo $_SESSION['teacher_name']; ?></b></h4>
    <h2 style="color: green;"><b> <?php echo $subject; ?></b></h2>
 </div>
</div>
<!--DATATABLE TEACHER CONTENT START-->  
 <div class="container-fluid mb-3 mt-3" >
  <table class="table table-striped mydatatable" >
    <thead class="thead"  style="background-color: green;">
        <tr class="btn-success">
          <th>Student ID</th>
          <th>Student Name</th>
          <th>School Year</th>
          <th>Midterm</th>
          <th>Final</th>
        </tr>
    </thead>
    <tbody>
      <?php
        //get all the student enrolled in subjects
        $get_enrolled = mysqli_query($con, "SELECT tblenrolled.subj_id, tblenrolled.student_id, tblenrolled.enroll_sy, tblstudent.id, tblstudent.std_no_id, CONCAT(tblstudent.std_fn, ' ', tblstudent.std_ln) as 'fullname' FROM tblenrolled, tblstudent WHERE tblenrolled.student_id = tblstudent.id AND tblenrolled.subj_id = '$subj_id'");
        while($row = mysqli_fetch_array($get_enrolled))
        {
          $student_id = $row['student_id'];
          $sy = $row['enroll_sy'];
          //get the grade of student in subject per current school year
          $get = mysqli_query($con, "SELECT midterm, final FROM tblgrade WHERE subj_id='$subj_id' AND student_id='$student_id' AND sy='$sy'");
          while($row2 = mysqli_fetch_array($get))
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
              <td>'.$row['std_no_id'].'</td>
              <td>'.$row['fullname'].'</td>
              <td>'.$row['enroll_sy'].'</td>
              <td>'.$midterm.'</td>
              <td>'.$final.'</td>
            </tr>';
          }
        }
      ?>
    </tbody>
  </table>
</div>
<!--DATATABLE TEACHER CONTENT END-->
<?php include '../../includes/Dean_Footer.php'?>