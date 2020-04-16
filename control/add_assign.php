<?php
include '../config/dbcon.php';

$teacher_id = $_POST['id'];
$subj_id = $_POST['subj_id'];
//get the current year
$current_year = date('Y');
$next_year = date('Y', strtotime('+1 year'));
$sy = 'SY '.$current_year.'-'.$next_year;//format the string

$save = mysqli_query($con, "INSERT INTO tblassign (subj_id, teacher_id, sy, status) VALUES ('$subj_id', '$teacher_id', '$sy', 1)");

if($save)
{
	echo 1;
}else{
	echo 0;
}
?>