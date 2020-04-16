<?php
include '../config/dbcon.php';

$id = $_POST['id'];

$remove = mysqli_query($con, "UPDATE tblassign SET status = 0 WHERE id = '$id'");

if($remove)
{
	echo 1;
}else{
	echo 0;
}
?>