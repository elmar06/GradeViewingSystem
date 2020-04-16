<?php
include '../config/dbcon.php';

$id = $_POST['id'];

$query = mysqli_query($con, "UPDATE tblsubject SET status =0 WHERE subj_id = '$id'");

if($query){
	echo 1;
}else{
	echo 0;
}

?>