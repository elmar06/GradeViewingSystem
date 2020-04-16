<?php include '../../includes/Dean_Header.php'?>
<!-- get the teacher details -->
<?php
$id = $_GET['id'];
$dept = $_SESSION['dept_code'];
//declare a global var
$user_id = '';
$get = mysqli_query($con, "SELECT * FROM tblfaculty WHERE id='$id'");
while($row = mysqli_fetch_array($get))
{
  $user_id = $row['user_id'];
  $_SESSION['teacher_name'] = $row['firstname'].' '.$row['lastname'];
  echo '
  <b><div class="container" style="margin-left: -0px; color: green;">
    <br><h4><i class="fas fa-user"></i> TEACHER NAME : <strong>'.$row['firstname'].' '.$row['lastname'].'</strong></h4>
  </div></b>';
}
?>

<!--DATATABLE TEACHER CONTENT START-->  
<div class="container-fluid mb-3 mt-3" >
  <table class="table table-striped mydatatable" >
    <thead class="thead"  style="background-color: green;">
      <tr class="btn-success">
          <th>Code</th>
          <th>Description</th>
          <th>Time</th>
          <th>Day</th>
          <th>Semister</th>
          <th>School Year</th>
          <th><center>Action</center></th>
      </tr>
    </thead>
    <tbody>
      <?php 
        //get the subject under the instructor in tblassign
        $get = mysqli_query($con, "SELECT tblassign.subj_id, tblassign.teacher_id, tblassign.sy, tblsubject.subj_code, tblsubject.subj_desc, tblsubject.subj_time, tblsubject.subj_day, tblsubject.subj_sem, tblsubject.subj_sy FROM tblassign, tblsubject WHERE tblassign.subj_id = tblsubject.subj_id AND tblassign.teacher_id = '$id'");
        while ($row = mysqli_fetch_array($get)) {
          echo'
          <tr>
            <td>'.$row['subj_code'].'</td>
            <td>'.$row['subj_desc'].'</td>
            <td>'.$row['subj_time'].'</td>
            <td>'.$row['subj_day'].'</td>
            <td>'.$row['subj_sem'].'</td>
            <td>'.$row['subj_sy'].'</td>
            <td><center><a href="Subject_Students_View.php?subj_id='.$row['subj_id'].'&teacher_id='.$id.'"><i class="fa fa-eye"></i> View Enrolled Student</a></center></td>
          </tr>';
        }
      ?>
    </tbody>
  </table>
</div>
<!--DATATABLE TEACHER CONTENT END-->
<?php include '../../includes/Dean_Footer.php';?>