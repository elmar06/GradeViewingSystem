<?php include '../../includes/Student_Header.php'?>
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
          $get = mysqli_query($con, "SELECT CONCAT(std_fn, ' ', std_ln) as 'fullname', std_stat, std_dept FROM tblstudent WHERE id = '$id'");
          while($row = mysqli_fetch_array($get))
          {
            //set the status
            if($row['std_stat'] == 1)
            {
              $status = '<i style="color: green">ACTIVE</i>';
            }else{
              $status = '<i style="color: red">INACTIVE</i>';
            }
            echo '
            <div class="col-md-8"  style="/*border :thick solid #0000FF; */font-family: Century Gothic">
              <h1><strong>NAME : '.$row['fullname'].'</strong></h1><br>
              <h1><strong>DEPARTMENT : '.$row['std_dept'].'</strong></h1><br>
              <h1><strong>STATUS : '.$status.'</strong></h1><br>
            </div>';
          }
        ?>         
    </div>
  </div>

<?php include '../../includes/Student_Footer.php'?>