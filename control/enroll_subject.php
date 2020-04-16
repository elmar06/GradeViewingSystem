<?php
include '../config/dbcon.php';

$student_id = $_POST['student_id'];
$subject_id = $_POST['subject_id'];
$semester = $_POST['semester'];
$sy = $_POST['sy'];

//save the data to tblenrolled
$enroll = mysqli_query($con, "INSERT INTO tblenrolled(subj_id, student_id, semester, enroll_sy, status) VALUES ('$subject_id', '$student_id', '$semester', '$sy', 1)");

//save the data to tblgrade for grading
$save =  mysqli_query($con, "INSERT INTO tblgrade(subj_id, student_id, midterm, final, sy, status) VALUES ('$subject_id', '$student_id', '', '','$sy', 1)");

if($enroll && $save)
{
	echo 1;
}else{
	echo 0;
}
?>