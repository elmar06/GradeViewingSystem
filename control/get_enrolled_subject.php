<?php
include '../config/dbcon.php';

$student_id = $_POST['id'];
$sy = $_POST['sy'];

$query = mysqli_query($con, "SELECT tblsubject.subj_code, tblsubject.subj_desc, tblsubject.subj_day, tblsubject.subj_time, tblsubject.subj_sem, tblenrolled.id, tblenrolled.subj_id, tblenrolled.student_id, tblenrolled.enroll_sy, tblenrolled.semester FROM tblsubject, tblenrolled WHERE tblenrolled.subj_id = tblsubject.subj_id AND tblenrolled.student_id = '$student_id' AND tblenrolled.enroll_sy = '$sy' AND tblenrolled.status != 0 ORDER BY tblenrolled.semester");
while($row = mysqli_fetch_array($query))
{
	echo '
	<tr>
		<td><center>'.$row['subj_code'].'</center></td>
		<td>'.$row['subj_desc'].'</td>
      	<td><center>'.$row['subj_time'].'</center></td>
      	<td><center>'.$row['subj_day'].'</center></td>
      	<td><center>'.$row['semester'].'</center></td>
		<td><center><a class="remove" href="#" value="'.$row['id'].'"><i class="fas fa-trash"></i> Remove</a></center></td>
	</tr>';
}

?>
<script>
//remove the subject 
$('.remove').on('click', function(){
	var id = $(this).attr('value');
	//data needed to get the latest list of subject enrolled
	var student_id = $('#student').val();
	var sy = $('#sy option:selected').text();
	var myData = 'id=' + student_id + '&sy=' + sy;

	$.ajax({
		type: 'POST',
		url: '../../control/remove_enrolled_subject.php',
		data: {id:id},
		success:function(response)
		{
			if(response > 0)
			{
				//get the newest enrolled subject
				$.ajax({
					type: 'POST',
					url: '../../control/get_enrolled_subject.php',
					data: myData,

					success: function(html)
					{
						$('#tblsubject-body').html(html);
					}
				})
			}else{

			}
		}
	})
})

</script>