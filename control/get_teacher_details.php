<?php
include '../config/dbcon.php';

$array = implode($_POST['id']);
$id = $array;

$query = mysqli_query($con, "SELECT tblfaculty.id as 'mem-id', tblfaculty.firstname, tblfaculty.lastname, tblfaculty.dept_id, tbldepartment.id, tbldepartment.dept_code FROM tblfaculty, tbldepartment WHERE tblfaculty.dept_id = tbldepartment.id AND tblfaculty.id = '$id'");

while ($row = mysqli_fetch_array($query)) 
{
	$fullname = $row['firstname'].' '.$row['lastname'];
	echo'
		<div class="form-group row">
            <div class="col-md-6">
            	<label class="control-label col-form-label">Name</label>
            	  <input id="teacher-id" type="text" class="form-control" value="'.$row['mem-id'].'" hidden>
                <input type="text" class="form-control" value="'.$fullname.'" disabled>
            </div>
            <div class="col-md-6">
            	<label class="control-label col-form-label">Department</label>
                <input type="text" class="form-control" value="'.$row['dept_code'].'" disabled>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-10">
            	<select type="text" class="form-control select2" id="subject" style="width: 100%:">
                    <option value="0" disabled selected>Select Subject Here...</option>';
                    //get the list of subj based on current school year
                    //get the current year
                		$year = date('Y');
                		$current_year = date('Y');
                		$next_year = date('Y', strtotime('+1 year'));
                		$sy = 'SY '.$current_year.'-'.$next_year;//format the string
                     	$get_subj = mysqli_query($con, "SELECT * FROM tblsubject WHERE subj_sy = '$sy' AND status != 0 ORDER BY subj_sem ASC");
                     	while($row1 = mysqli_fetch_array($get_subj))
                     	{
                     		echo '<option value="'.$row1['subj_id'].'">'.$row1['subj_code'].' | '.$row1['subj_day'].' | '.$row1['subj_time'].' | '.$row1['subj_sem'].'</option>';
                     	}
                echo '</select>
            </div>
            <div class="col-md-2">
            	<center><button id="assign" class="btn btn-success"><i class="fas fa-check-circle"></i></button></center>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-12">
        		<div id="assign-error" class="alert alert-danger" role="alert" style="display: none"></div>
        	</div>
        </div>
        <div class="table-responsive table-sm">
          <table class="table table-bordered">
              <thead class="thead-light">
                  <tr>
                    <th><center>Code</center></th>
                    <th><center>Day</center></th>
                    <th><center>Time</center></th>
                    <th>Sem</th>
                    <th><center>Action</center></th>
                  </tr>
              </thead>
              <tbody id="tblsubcat-body">';
              //get the list of subj enrolled in teacher (SY current yr - next yr)
                //get the current year
              	$current_year = date('Y');
              	$next_year = date('Y', strtotime('+1 year'));
              	$sy = 'SY '.$current_year.'-'.$next_year;//format the string
              	$get = mysqli_query($con, "SELECT tblassign.id as 'assign-id', tblassign.subj_id, tblassign.teacher_id, tblsubject.subj_code, tblsubject.subj_time, tblsubject.subj_day, tblsubject.subj_sem, tblfaculty.id FROM tblassign, tblfaculty, tblsubject WHERE tblassign.teacher_id = tblfaculty.id AND tblassign.subj_id = tblsubject.subj_id AND tblassign.sy = '$sy' AND tblassign.teacher_id = '$id' AND tblassign.status != 0 ORDER BY tblsubject.subj_sem DESC");
                while($row2 = mysqli_fetch_array($get))
                {
                	echo '
        						<tr>
        							<td><center>'.$row2['subj_code'].'</center></td>
        							<td><center>'.$row2['subj_day'].'</center></td>
        							<td><center>'.$row2['subj_time'].'</center></td>
        							<td><center>'.$row2['subj_sem'].'</center></td>
        							<td><center>
        							<button class="btn btn-danger remove" value="'.$row2['assign-id'].'"><i class="fas fa-times-circle"></i></button>
        							</center></td>
        						<tr>';
                }           
          echo'</tbody>
          </table>
        </div>';
}
?>
<script>
$('.select2').select2();

//save assigned subject
$('#assign').on('click', function(){
    var id = $('#teacher-id').val();
    var subj_id = $('#subject').val();
    var myData = 'id=' + id + '&subj_id=' + subj_id;

    if(id != 0){
	    $.ajax({
	    	type: 'POST',
	    	url: '../../control/add_assign.php',
	    	data: myData,

	    	success: function(response)
	    	{
	    		if(response > 0){
	    			//get the latest list
		    		$.ajax({
              type: 'POST',
		    			url: '../../control/view_assign_subject.php',
              data: {id:id},//teacher ID
		    			success: function(html)
		    			{
		    				$('#tblsubcat-body').html(html);
		    			}
		    		})
	    		}else{
	    			$('#assign-error').html('<center><i class="fas fa-ban"></i> ERROR! Failed to Assign Subject in Teacher.</center>');
			        $('#assign-error').show();
			        setTimeout(function(){
			            $('#assign-error').hide();
			        }, 2000)
	    		}
	    	}
	    })
	}else{
		$('#assign-error').html('<center><i class="fas fa-ban"></i> ERROR! No Subject selected.</center>');
        $('#assign-error').show();
        setTimeout(function(){
            $('#assign-error').hide();
        }, 2000)
	}
})

//remove the subject from teacher
$('.remove').on('click', function(){
	var id = $(this).attr('value');
  var teacher_id = $('#teacher-id').val();

	$.ajax({
		type: 'POST',
		url: '../../control/remove_assignee.php',
		data: {id: id},

		success: function(response)
		{
			if(response > 0)
			{
				//get the latest list
	    		$.ajax({
            type: 'POST',
	    			url: '../../control/view_assign_subject.php',
            data:{id: teacher_id},
	    			success: function(html)
	    			{
	    				$('#tblsubcat-body').html(html);
	    			}
	    		})
			}else{
				toastr.error('ERROR! Removing Failed.')
			}
		}
	})
})
</script>