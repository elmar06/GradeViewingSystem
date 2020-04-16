<?php
include '../config/dbcon.php';

//get the latest id
$query = mysqli_query($con, "SELECT max(id) + 1 as id FROM tblstudent");
while ($row = mysqli_fetch_array($query)) 
{	
	$id = str_pad($row['id'], 5, "0", STR_PAD_LEFT);
	//get the curent year
	$yr = date('y');
	//format id
	$std_id = $yr.'-'.$id;
}

$std_no_id = $std_id;
$fn = $_POST['firstname'];
$ln = $_POST['lastname'];
$course = $_POST['course'];
$dept = $_POST['dept'];
$password = md5('123456');
$status = 1;

$save = mysqli_query($con, "INSERT INTO tblstudent (std_no_id, std_fn, std_ln, std_course, std_dept, std_pass, std_stat) VALUES ('$std_no_id', '$fn', '$ln', '$course', '$dept', '$password', '$status')");

if($save)
{
	echo 1;
}else{
	echo 0;
}
?>