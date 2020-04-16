<?php include '../../includes/Registrar_Header.php'?>
  <br><div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="container">
          <i class="fas fa-user fa-10x"></i>
          <div class="container">
            <h1>HOME</h1>
          </div>
        </div>
      </div>
        <!-- get the data of the user -->
        <?php
          $id = $_SESSION['id'];
          $get = mysqli_query($con, "SELECT tblfaculty.firstname, tblfaculty.lastname, tblfaculty.status, tbldepartment.id as 'dept-id', tbldepartment.dept_code FROM tblfaculty, tbldepartment WHERE tblfaculty.id = '$id' AND tblfaculty.dept_id = tbldepartment.id");
          while($row = mysqli_fetch_array($get))
          {
            //set fullname
            $fullname = $row['firstname'].' '.$row['lastname'];
            //set the status
            if($row['status'] == 1)
            {
              $status = '<i style="color: green">ACTIVE</i>';
            }else{
              $status = '<i style="color: red">INACTIVE</i>';
            }
            echo '
            <div class="col-md-8"  style="/*border :thick solid #0000FF; */font-family: Century Gothic">
              <h1><strong>NAME : '.$fullname.'</strong></h1><br>
              <h1><strong>DEPARTMENT : '.$row['dept_code'].'</strong></h1><br>
              <h1><strong>STATUS : '.$status.'</strong></h1><br>
            </div>';
          }
        ?>         
    </div>
  </div>
<?php include '../../includes/Registrar_Footer.php'?>