<?php
include '../config/dbcon.php';

$id = $_POST['id'];

$get = mysqli_query($con, "SELECT tblsubject.subj_code, CONCAT(tblstudent.std_fn, ' ', tblstudent.std_ln) as 'student-name', tblgrade.midterm, tblgrade.final FROM tblsubject, tblstudent, tblgrade WHERE tblstudent.id = tblgrade.student_id AND tblsubject.subj_id = tblgrade.subj_id AND tblgrade.id = '$id'");

while($row = mysqli_fetch_array($get))
{
	echo '
		<div class="row">
			<div class="col-lg-12">
				<input id="id" class="form-control" value="'.$id.'" hidden></input>
				<label style="color:green"><b>'.$row['subj_code'].'</b></label>
			</div>
			<div class="col-lg-12">
				<label style="color:blue"><b>'.$row['student-name'].'</b></label>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Midterm Grade</label>
                    <input id="midterm" type="text" class="form-control" value="'.$row['midterm'].'"></input>
                </div>
            </div>
		</div>
		<div class="row">
			<div class="col-lg-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Final Grade</label>
                    <input id="final" type="text" class="form-control" value="'.$row['final'].'"></input>
                </div>
            </div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div id="add-success" class="alert alert-success" role="alert" style="display: none"></div>  
	          	<div id="add-error" class="alert alert-danger" role="alert" style="display: none"></div>
	        </div>
		</div>';
}
?>