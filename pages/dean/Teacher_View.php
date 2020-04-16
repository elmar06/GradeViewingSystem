<?php 
include '../../includes/Dean_Header.php';
$dept_id = $_SESSION['dept_id'];
$dept_code = $_SESSION['dept_code'];
$id = $_SESSION['id'];
?>
<div class="container">
  <div class="row" style="margin-left: -100px; margin-right: -100px">
    <div class="col-lg-12">
    <h1 style="color: green;"><i class="fas fa-address-card"></i> TEACHERS IN <b><?php echo $dept_code; ?></b></h1>
    <!--DATATABLE TEACHER CONTENT START-->
    <div class="container-fluid mb-3 mt-3" >
      <table class="table table-striped mydatatable" >
        <thead class="thead" style="background-color: green;">
            <tr class="btn-success">
                <th>Instructor ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th><center>Action</center></th>
            </tr>
        </thead>
        <tbody>
          <?php 
            //get the teacher per department
            $displayData = mysqli_query($con, "SELECT id, user_id, firstname, lastname FROM tblfaculty WHERE dept_id = '$dept_id' AND id != '$id'");
            while ($row = mysqli_fetch_array($displayData)) 
            {
              echo 
              '<tr>
                <td>'.$row['user_id'].'</td>
                <td>'.$row['firstname'].'</td>
                <td>'.$row['lastname'].'</td>
                <td><center><a href="Teachers_Subject_View.php?id='.$row['id'].'"><i class="fas fa-eye"></i> View Subjects</a></center></td>
              </tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
    </div>
  </div>
</div>
<?php include '../../includes/Dean_Footer.php'?>