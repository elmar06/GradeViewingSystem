<?php
include '../config/dbcon.php';

$code = $_POST['code'];
$description = $_POST['description'];
$time = $_POST['time'];
$day = $_POST['day'];
$sem = $_POST['sem'];
$sy = $_POST['sy'];
$status = 1;

$save = mysqli_query($con, "INSERT INTO tblsubject (subj_code, subj_desc, subj_time, subj_day, subj_sem, subj_sy, status) VALUES ('$code', '$description', '$time', '$day', '$sem', '$sy', '$status')");

if($save)
{
	echo 1;
}else{
	echo 0;
}
?>