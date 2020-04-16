<?php
include '../config/dbcon.php';

$id = $_POST['id'];

$query = mysqli_query($con, "UPDATE tblstudent SET std_stat = 0 WHERE id = '$id'");

if($query){
	echo 1;
}else{
	echo 0;
}

?>