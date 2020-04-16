<?php
include '../config/dbcon.php';

$id = $_POST['id'];
//get the current year
$current_year = date('Y');
$next_year = date('Y', strtotime('+1 year'));
$sy = 'SY '.$current_year.'-'.$next_year;//format the string
$get = mysqli_query($con, "SELECT tblassign.id as 'assign-id', tblassign.subj_id, tblassign.teacher_id, tblsubject.subj_code, tblsubject.subj_time, tblsubject.subj_day, tblsubject.subj_sem, tblfaculty.id FROM tblassign, tblfaculty, tblsubject WHERE tblassign.teacher_id = tblfaculty.id AND tblassign.subj_id = tblsubject.subj_id AND tblassign.sy = '$sy' AND tblassign.teacher_id = '$id' AND tblassign.status != 0 ORDER BY tblsubject.subj_sem DESC");
while($row2 = mysqli_fetch_array($get))
{
echo '
		<tr>
			<td><center>'.$row2['subj_code'].'</center></td>
			<td><center>'.$row2['subj_day'].'</center></td>
			<td><center>'.$row2['subj_time'].'</center></td>
			<td><center>'.$row2['subj_sem'].'</center></td>
			<td><center>
			<button class="btn btn-danger del-subcategory" value="'.$row2['assign-id'].'"><i class="fas fa-times-circle"></i></button>
			</center></td>
		<tr>';
}
?>