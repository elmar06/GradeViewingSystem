<?php
include '../config/dbcon.php';

//get all the subject
$get_student = mysqli_query($con, "SELECT * FROM tblstudent WHERE std_stat != 0 ORDER BY std_no_id ASC");
while ($row = mysqli_fetch_array($get_student)) 
{
echo 
'<tr>
    <td>'.$row['std_no_id'].'</td>
    <td>'.$row['std_fn'].'</td>
    <td>'.$row['std_ln'].'</td>
    <td>'.$row['std_course'].'</td>
    <td><center>'.$row['std_dept'].'</center></td>
    <td><center><a class="edit_subj" href="#" value="'.$row['id'].'"><i class="fas fa-edit edit"></i> Edit</a> || <a class="remove_subj" href="#" value="'.$row['id'].'"><i class="fas fa-trash"></i> Remove</a></center></td>
</tr>';
}
?>
<script type="text/javascript">
//get the student details for update
$('.edit').on('click', function(){
	var id = $(this).attr('value');

	$.ajax({
		type: 'POST',
		url: '../../control/get_student_details.php',
		data: {id: id},

		success: function(html)
		{
			$('#updStudentModal').modal('show');
			$('.details-body').html(html);
		}
	})
})

//remove student function
$('.remove_student').on('click', function(){
	var id = $(this).attr('value');

	$.ajax({
		type: 'POST',
		url: '../../control/remove_student.php',
		data: {id: id},

		success: function(response)
		{
			if(response > 0){
				//get the updated list
				$.ajax({
					url: '../../control/view_all_student.php',
					success: function(html)
					{
						$('#student-list-body').html(html);
						toastr.success('Student successfully removed.');
					}
				})
			}else{
				toastr.error('ERROR! Remove Failed');
			}
		}
	})
})	

</script>