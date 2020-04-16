<?php
include '../config/dbcon.php';

$id = $_POST['id'];
$code = $_POST['code'];
$description = $_POST['description'];
$time = $_POST['time'];
$day = $_POST['day'];
$sem = $_POST['sem'];
$sy = $_POST['sy'];

$query = mysqli_query($con, "UPDATE tblsubject SET subj_code='$code', subj_desc='$description', subj_time='$time', subj_day='$day', subj_sem='$sem', subj_sy='$sy' WHERE subj_id='$id'");

if($query)
{
	echo 1;
}else{
	echo 0;
}
?>