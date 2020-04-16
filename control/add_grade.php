<?php 
include '../config/dbcon.php';

$id = $_POST['id'];
$midterm = $_POST['midterm'];
$final = $_POST['final'];

$query = mysqli_query($con, "UPDATE tblgrade SET midterm = '$midterm', final = '$final' WHERE id='$id'");

if($query)
{
	echo 1;
}else{
	echo 0;
}
?>