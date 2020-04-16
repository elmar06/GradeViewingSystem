<?php
include '../config/dbcon.php';

$id = $_POST['id'];
$password = md5('123456');

$query = mysqli_query($con, "UPDATE tblfaculty SET password = '$password' WHERE id='$id'");

//check if query execute
if($query){
    echo 1;
}else{
    echo 0;
}
?>