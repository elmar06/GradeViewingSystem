<?php
include '../config/dbcon.php';

$id = $_POST['id'];
//update the tblenrolled
$remove = mysqli_query($con, "UPDATE tblenrolled SET status = 0 WHERE id = '$id'");

//update the tblgrade
$update = mysqli_query($con, "UPDATE tblgrade SET status = 0 WHERE id = '$id'");

if($remove && $update)
{
	echo 1;
}else{
	echo 0;
}
?>