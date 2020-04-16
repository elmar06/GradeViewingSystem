<?php 
session_start();
include '../config/dbcon.php';

$id = $_SESSION['id'];
//get the subject assign in teacher
$get_subject = mysqli_query($con,  "SELECT tblsubject.subj_id, tblsubject.subj_code, tblsubject.subj_day, tblsubject.subj_time, tblsubject.subj_sy, tblassign.subj_id FROM tblsubject, tblassign WHERE tblsubject.subj_id = tblassign.subj_id AND tblassign.teacher_id = '$id'");
while ($row = mysqli_fetch_array($get_subject)) 
{
  $subject = $row['subj_id'];
  //get all the student enrolled in subject
  $get_assign = mysqli_query($con, "SELECT tblstudent.std_no_id, CONCAT(tblstudent.std_fn, ' ', tblstudent.std_ln) as 'student-name', tblenrolled.id, tblenrolled.subj_id, tblgrade.id as 'grade-id', tblgrade.student_id, tblgrade.midterm, tblgrade.final FROM tblstudent, tblgrade, tblenrolled WHERE tblgrade.id = tblenrolled.id AND tblstudent.id = tblenrolled.student_id AND tblenrolled.subj_id = '$subject'");
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
        <td><center>'.$row['subj_sy'].'</center></td>
        <td><center>'.$midterm.'</center></td>
        <td><center>'.$final.'</center></td>
        <td><center><a class="add_grade" href="#" value="'.$row2['grade-id'].'"><i class="fas fa-edit edit"></i> Add Grade</a></center></td>
      </tr>';
  }
}
?>
<script>
//adding of grade
//get the student details and show the modal function
$('.add_grade').on('click', function(){
  var id = $(this).attr('value');

  $.ajax({
    type: 'POST',
    url: '../../control/get_grade_details.php',
    data: {id:id},

    success:function(html)
    {
      $('#gradeModal').modal('show');
      $('.grade-body').html(html);
    }
  })
})
</script>