<?php 
include '../config/dbcon.php';

$id = $_POST['id'];

$query = mysqli_query($con, "SELECT * FROM tblsubject WHERE subj_id = '$id'");

while($row = mysqli_fetch_array($query))
{
	echo '
		<div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Code</label>
                    <input type="text" class="form-control" id="upd-id" value="'.$row['subj_id'].'" hidden>
                    <input type="text" class="form-control" id="upd-code" value="'.$row['subj_code'].'">
                </div>
            </div>
          </div> 
          <div class="row">
            <div class="col-lg-12">
               <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea type="text" class="form-control" id="upd-description">'.$row['subj_desc'].'</textarea>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Time</label>
                    <input type="text" class="form-control" id="upd-time" value="'.$row['subj_time'].'">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Day</label>
                    <input type="text" class="form-control" id="upd-day" value="'.$row['subj_day'].'">
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Semester</label>
                    <input type="text" class="form-control" id="upd-semester" value="'.$row['subj_sem'].'">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">School Year</label>
                    <input type="text" class="form-control" id="upd-school-year" value="'.$row['subj_sy'].'"></input>
                </div>
            </div>
          </div> 
          <div id="upd-success" class="alert alert-success" role="alert" style="display: none"></div>  
          <div id="upd-error" class="alert alert-danger" role="alert" style="display: none"></div>';
}
?>