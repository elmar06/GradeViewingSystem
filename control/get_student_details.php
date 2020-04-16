<?php
include '../config/dbcon.php';

$id = $_POST['id'];

$query = mysqli_query($con, "SELECT * FROM tblstudent WHERE id='$id'");
while($row = mysqli_fetch_array($query))
{
	echo '
		<div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Student ID No.</label>
                  <input type="text" class="form-control" value="'.$row['std_no_id'].'" disabled>
                  <input type="text" class="form-control" id="upd-id" value="'.$row['id'].'" hidden>
              </div>
            </div>
        </div>
		<div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Firstname</label>
                  <input type="text" class="form-control" id="upd-firstname" value="'.$row['std_fn'].'">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">lastname</label>
                  <input type="text" class="form-control" id="upd-lastname" value="'.$row['std_ln'].'">
              </div>
            </div>
          </div> 
          <div class="row">
           <div class="col-lg-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Course</label>
                  <input type="text" class="form-control" id="upd-course" value="'.$row['std_course'].'">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Department</label>
                  <select type="text" class="form-control" id="upd-department" value="'.$row['std_dept'].'">
                    <option value="0" disabled selected>Select Department</option>';
                    if($row['std_dept'] == "SCS"){
                    	echo '<option value="SCS" selected>SCS</option>
		                      <option value="STE">STE</option>
		                      <option value="SLS">SLS</option>
		                      <option value="SBS">SBS</option>';
                    }else if($row['std_dept'] == "STE"){
                    	echo '<option value="SCS">SCS</option>
		                      <option value="STE" selected>STE</option>
		                      <option value="SLS">SLS</option>
		                      <option value="SBS">SBS</option>';
                    }else if($row['std_dept'] == "SLS"){
                    	echo '<option value="SCS">SCS</option>
		                      <option value="STE">STE</option>
		                      <option value="SLS" selected>SLS</option>
		                      <option value="SBS">SBS</option>';
                    }else if($row['std_dept'] == "SBS"){
                    	echo '<option value="SCS">SCS</option>
		                      <option value="STE">STE</option>
		                      <option value="SLS">SLS</option>
		                      <option value="SBS" selected>SBS</option>';
                    }else{
                    	echo '<option value="SCS">SCS</option>
		                      <option value="STE">STE</option>
		                      <option value="SLS">SLS</option>
		                      <option value="SBS">SBS</option>';
                    }
                  echo '</select>
              </div>
            </div>
          </div>
          <div id="upd-success" class="alert alert-success" role="alert" style="display: none"></div>  
          <div id="upd-error" class="alert alert-danger" role="alert" style="display: none"></div> ';
}
?>