<?php
include '../config/dbcon.php';

$id = $_POST['id'];
$user_id = $_POST['user_id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$access = $_POST['access'];
$dept_id = $_POST['dept_id'];

$query = mysqli_query($con, "UPDATE tblfaculty SET user_id='$user_id', firstname='$firstname', lastname='$lastname', username='$username', access='$access', dept_id='$dept_id' WHERE id='$id'");

//check if query execute
if($query){
    echo 1;
}else{
    echo 0;
}
?>