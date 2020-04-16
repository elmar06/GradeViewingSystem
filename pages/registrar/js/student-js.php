<script>
$('.select2').select2();
//add student function
function add_student()
{
	var firstname = $('#firstname').val();
	var lastname = $('#lastname').val();
	var course = $('#course').val();
	var dept = $('#department').val();
	var myData = 'firstname=' + firstname + '&lastname=' + lastname + '&course=' + course + '&dept=' + dept;

	if(firstname != '' && lastname != '' && course != '' && dept != 0){
		$.ajax({
			type: 'POST',
			url: '../../control/add_student.php',
			data: myData,
			success: function(response)
			{
				if(response > 0)
				{
					//get the updated list
					$.ajax({
						url: '../../control/view_all_student.php',
						success: function(html)
						{
							$('#student-list-body').html(html);
							$('#add-success').html('<center><i class="fas fa-check"></i> Student successfully added.</center>');
				            $('#add-success').show();
				            setTimeout(function(){
				                $('#add-success').hide();
				            }, 1500)
						}
					})
				}else{
					$('#add-error').html('<center><i class="fas fa-ban"></i> Adding Failed.</center>');
		            $('#add-error').show();
		            setTimeout(function(){
		                $('#add-error').hide();
		            }, 1500)
				}
			}
		})
	}else{
		$('#add-error').html('<center><i class="fas fa-ban"></i> Please fill out all the failed needed.</center>');
        $('#add-error').show();
        setTimeout(function(){
            $('#add-error').hide();
        }, 1500)
	}
}
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

//save update 
function upd_student_details()
{
	var id = $('#upd-id').val();
	var firstname = $('#upd-firstname').val();
	var lastname = $('#upd-lastname').val();
	var course = $('#upd-course').val();
	var dept = $('#upd-department').val();
	var myData = 'id=' + id + '&firstname=' + firstname + '&lastname=' + lastname + '&course=' + course + '&dept=' + dept;

	if(firstname != '' && lastname != '' && course != '' && dept != 0){
		$.ajax({
			type: 'POST',
			url: '../../control/upd_student.php',
			data: myData,
			success: function(response)
			{
				if(response > 0)
				{
					//get the updated list
					$.ajax({
						url: '../../control/view_all_student.php',
						success: function(html)
						{
							$('#student-list-body').html(html);
							$('#upd-success').html('<center><i class="fas fa-check"></i> Student Details successfully updated.</center>');
				            $('#upd-success').show();
				            setTimeout(function(){
				                $('#upd-success').hide();
				            }, 1500)
						}
					})
				}else{
					$('#upd-error').html('<center><i class="fas fa-ban"></i> Update Failed.</center>');
		            $('#upd-error').show();
		            setTimeout(function(){
		                $('#upd-error').hide();
		            }, 1500)
				}
			}
		})
	}else{
		$('#upd-error').html('<center><i class="fas fa-ban"></i> Please fill out all the failed needed.</center>');
        $('#upd-error').show();
        setTimeout(function(){
            $('#upd-error').hide();
        }, 1500)
	}
}

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

//get the student enrolled subject when the name is selected
$('#student').on('change', function(){
	var id = $(this).val();
	var sy = $('#sy option:selected').text();
	var myData = 'id=' + id + '&sy=' + sy;

	$.ajax({
		type: 'POST',
		url: '../../control/get_enrolled_subject.php',
		data: myData,

		success: function(html)
		{
			$('#tblsubject-body').html(html);
			$('#sy').attr('disabled', false);//inenable the successfully
		}
	})
})

//get the student enrolled subject when school year is change
$('#sy').on('change', function(){
	var sy = $('#sy option:selected').text();
	var id = $('#student option:selected').val();
	var myData = 'id=' + id + '&sy=' + sy;

	$.ajax({
		type: 'POST',
		url: '../../control/get_enrolled_subject.php',
		data: myData,

		success: function(html)
		{
			$('#tblsubject-body').html(html);
		}
	})
})

//enroll subject student
function enroll_subject()
{
	var student_id = $('#student').val();
	var subject_id = $('#subject').val();
	var semester = $('#semester').val();
	var sy = $('#sy option:selected').text();
	var myData = 'student_id=' + student_id + '&subject_id=' + subject_id + '&semester=' + semester + '&sy=' + sy;
	var myData2 = 'id=' + student_id + '&sy=' + sy;

	if(student_id != null && subject_id != null && semester != null)
	{
		$.ajax({
			type: 'POST',
			url: '../../control/enroll_subject.php',
			data: myData,

			success: function(response)
			{
				if(response > 0){
					//get the newest enrolled subject
					$.ajax({
						type: 'POST',
						url: '../../control/get_enrolled_subject.php',
						data: myData2,

						success: function(html)
						{
							$('#tblsubject-body').html(html);
						}
					})
				}else{
					//display error message for error in query
					toastr.error('ERROR! Enrolled Failed. Please contact the system administrator.');
				}	
				
			}
		})
	}else{
		//display error when some data is missing, empty or null
		toastr.error('ERROR! Enrolled Failed. Please check all the data needed.');
	}
}

</script>