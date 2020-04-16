<?php
$con = mysqli_connect('localhost','root','');
if(!$con){die("Database connection failed!");}//establishing connection to the server

$db = mysqli_select_db($con, 'wbgs');
if(!$db){die("Database Selection Failed: " . mysqli_error($con));}   
?>