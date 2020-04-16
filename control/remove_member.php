<?php
include '../config/dbcon.php';

$id = $_POST['id'];

$query = mysqli_query($con, "UPDATE tblfaculty SET status = 0 WHERE id='$id'");

//check if query execute
if($query){
    echo 1;
}else{
    echo 0;
}
?>