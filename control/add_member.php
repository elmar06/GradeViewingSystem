<?php
include '../config/dbcon.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = md5('123456');
$access = $_POST['access'];
$dept_id = $_POST['dept_id'];
$dept_name = $_POST['dept_name'];

//get the latest id
$query = mysqli_query($con, "SELECT max(id) + 1 as id FROM tblfaculty");
while ($row = mysqli_fetch_array($query)) 
{	
	$id = str_pad($row['id'], 5, "0", STR_PAD_LEFT);
	//get the curent year
	$yr = date('y');
	if($access == 1){//dean
		//format id
		$user_id = 'D'.$dept_name.$id;
	}else if($access == 2){//teacher
		//format id
		$user_id = 'INSTRC'.$id;
	}else{//registrar
		//format id
		$user_id = 'REG'.$id;
	}
}

$query = mysqli_query($con, "INSERT INTO tblfaculty (`user_id`, `firstname`, `lastname`, `username`, `password`, `access`, `dept_id`, `status`) VALUES ('$user_id','$firstname', '$lastname', '$username', '$password', '$access', '$dept_id', 1)");

//check if query execute
if($query){
    echo 1;
}else{
    echo 0;
}
?>