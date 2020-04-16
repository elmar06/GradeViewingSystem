<?php
	session_start();
    // CONNECT TO DATABASE
    include_once('../config/dbcon.php');
	
	// GET VALUES FROM INDEX PAGE
	$username = mysqli_real_escape_string($con, $_POST['username']);
    $password = md5(mysqli_real_escape_string($con, $_POST['password']));
    
	$action = $_POST['action'];

	if($action == 1){
        $query="SELECT * FROM tblfaculty WHERE username = '$username' AND password = '$password' AND status != 0";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $check = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
        if($check > 0){
            $_SESSION['username'] = $row['username'];
            $_SESSION['access'] = $row['access'];
            $_SESSION['fullname'] = $row['firstname'].' '.$row['lastname'];
            $_SESSION['id'] = $row['id'];
            echo 1;
        }else{
            echo 0;
        }
    }else{
        //student login
        $query="SELECT * FROM tblstudent WHERE std_no_id = '$username' AND std_pass = '$password' AND std_stat != 0";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $check = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
        if($check > 0){
            $_SESSION['fullname'] = $row['std_fn'].' '.$row['std_ln'];
            $_SESSION['id'] = $row['id'];
            echo 1;
        }else{
            echo 0;
        }
    }

?>






