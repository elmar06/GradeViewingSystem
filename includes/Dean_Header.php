<?php 
session_start();
include '../../config/dbcon.php';
if(!isset($_SESSION['username'])){
  header('location:../../index.php');
}
$id = $_SESSION['id'];?>
?>
<!DOCTYPE html>
<html>
<head>
	<title>WBGS - Dean</title>
	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <!-- LINK FOR DATABLE -->
  <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <!-- toastr -->
  <link href="../../assets/toastr/toastr.css" rel="stylesheet" type="text/css">

</head>
<body>

<!-- NAVIGATION BAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style=" width: 100%">
  <a class="navbar-brand" href="Dean_Home.php"><img src="../../images/CCC01.png" ></a>
    <div  style="margin-top: 6%" class="float-right">
      <a href="Home.php"><button class="btn btn-outline-success pull-right"><i class="fas fa-home"></i> HOME</button></a>&nbsp;&nbsp;
      <a href="Teacher_View.php"><button class="btn btn-outline-success pull-right"><i class="fas fa-user-friends"></i> TEACHER</button></a>&nbsp;&nbsp;
      <a href="Subject_List.php"><button class="btn btn-outline-success pull-right"><i class="fas fa-book-open"></i> SUBJECT</button></a>&nbsp;&nbsp;
      <a href="Student_List.php"><button class="btn btn-outline-success pull-right"><i class="fas fa-users"></i> STUDENT</button></a>&nbsp;&nbsp;
      <a href="../../control/logout.php"><button class="btn btn-outline-success"><i class="fas fa-sign-out-alt"></i> LOGOUT</button></a>&nbsp;&nbsp;
    </div>
</nav>