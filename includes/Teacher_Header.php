<?php 
session_start();
include '../../config/dbcon.php';
if(!isset($_SESSION['username'])){
  header('location:../../index.php');
}
$id = $_SESSION['id'];?>

<!DOCTYPE html>
<html>
<head>
	<title>Teacher</title>
	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/dataTables.bootstrap4.min.css"><!-- LINK FOR DATABLE -->
	<link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
</head>
<body>

<!-- NAVIGATION BAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style=" width: 100%">
  <a class="navbar-brand" href="Home.php"><img src="../../images/CCC01.png" ></a>
    <div  style="margin-top: 6%" class="float-right">
        <a href="Home.php"><button class="btn btn-outline-success"><i class="fas fa-home"></i> HOME</button></a>&nbsp;&nbsp;
        <a href="Subjects_List.php"><button class="btn btn-outline-success"><i class="fas fa-book-open"></i> SUBJECTS</button></a>&nbsp;&nbsp;
        <a href="Student_List.php"><button class="btn btn-outline-success"><i class="fas fa-users"></i> STUDENTS</button></a>&nbsp;&nbsp;
        <a href="../../control/logout.php"><button class="btn btn-outline-success"><i class="fas fa-sign-out-alt"></i> LOGOUT</button></a>&nbsp;&nbsp;
    </div>
</nav>

<!-- INVALID LOGOUT MESSAGE -->
<br><div class="container">
  <?php if (isset($_SESSION['msg'])) {?>
    <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class=" alert alert-warning alert-dismissible" role="alert">
              <?php echo $_SESSION['msg']?>
           </div>
        </div>
      </div> 
  </div>
  <?php unset($_SESSION['msg']); }?>
</div>


