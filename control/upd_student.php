<?php
include '../config/dbcon.php';

$id = $_POST['id'];
$fn = $_POST['firstname'];
$ln = $_POST['lastname'];
$course = $_POST['course'];
$dept = $_POST['dept'];

$query = mysqli_query($con, "UPDATE tblstudent SET std_fn='$fn', std_ln='$ln', std_course='$course', std_dept='$dept' WHERE id='$id'");

if($query)
{
	echo 1;
}else{
	echo 0;
}
?>