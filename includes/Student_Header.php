<?php 
session_start();
include '../../config/dbcon.php';
if(!isset($_SESSION['id'])){
  header('location:../../index.php');
}
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student</title>
	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/dataTables.bootstrap4.min.css"><!-- LINK FOR DATABLE -->
	<link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
</head>
<body>

<!-- NAVIGATION BAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style=" width: 100%">
  <a class="navbar-brand" href="Student_Home.php"><img src="../../images/CCC01.png" ></a>
    <div  style="margin-top: 6%" class="float-right">
      <a href="Home.php"><button class="btn btn-outline-success"><i class="fa fa-home"></i> HOME</button></a>&nbsp;&nbsp;
      <a href="View_Grade.php"><button class="btn btn-outline-success"><i class="fa fa-list"></i> VIEW GRADE</button></a>&nbsp;&nbsp;
      <a href="../../control/logout.php"><button class="btn btn-outline-success"><i class="fa fa-sign-out-alt"></i> LOGOUT</button></a>&nbsp;&nbsp;
    </div>
</nav>