<?php include '../../includes/Teacher_Header.php'?>
<br><div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="container">
          <div class="container">
            <img src="../../images/profile.svg" style="width: 60%; height: 60%;">
            <h1>&nbsp;&nbsp;HOME</h1>
          </div>
        </div>
      </div>
        <!-- get the data of the user -->
        <?php
          $id = $_SESSION['id'];
          $get = mysqli_query($con, "SELECT tblfaculty.firstname, tblfaculty.lastname, tblfaculty.status, tbldepartment.id as 'dept-id', tbldepartment.dept_code FROM tblfaculty, tbldepartment WHERE tblfaculty.id = '$id' AND tblfaculty.dept_id = tbldepartment.id");
          while($row = mysqli_fetch_array($get))
          {
            $_SESSION['dept_id'] = $row['dept-id'];
            $_SESSION['dept_code'] = $row['dept_code'];
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
<?php include '../../includes/Teacher_Footer.php'?>