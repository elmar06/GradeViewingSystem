<script>
//add subject
function add_subject()
{
	var code = $('#code').val();
	var description = $('#description').val();
	var time = $('#time').val();
	var day = $('#day').val();
	var sem = $('#semester').val();
	var sy = $('#school-year').val();
	var myData = 'code=' + code + '&description=' + description + '&time=' + time + '&day=' + day + '&sem=' + sem + '&sy=' + sy;

	if(code != '' && description != '' && time != '' && day != '' && sem != '' && sy)
	{
		$.ajax({
			type: 'POST',
			url: '../../control/add_subject.php',
			data: myData,
			success: function(response)
			{
				if(response > 0)
				{
					//get the new list of subject
					$.ajax({
						url: '../../control/view_all_subject.php',
						success: function(html)
						{
							$('#subject-list-body').html(html);
							$('#add-success').html('<center><i class="fas fa-check"></i> Subject successfully added.</center>');
				            $('#add-success').show();
				            setTimeout(function(){
				                $('#add-success').hide();
				            }, 1500)
						}
					})
				}else{
					//display alert when detect an empty data
				    $('#add-error').html('<center><i class="fas fa-ban"></i> ERROR! Adding Failed.</center>');
				    $('#add-error').show();
				    setTimeout(function(){
				    	$('#upd-error').hide();
				    }, 2000)
				} 
			}
		})
	}else{
		//display alert when detect an empty data
	    $('#add-error').html('<center><i class="fas fa-ban"></i> ERROR! Please fill out all the data needed.</center>');
	    $('#add-error').show();
	    setTimeout(function(){
	    	$('#add-error').hide();
	    }, 2000)
	}
}

//get the subject details
$('.edit_subj').on('click', function(){
	var id = $(this).attr('value');

	$.ajax({
		type: 'POST',
		url: '../../control/get_subject_details.php',
		data: {id:id},
		success: function(html)
		{
			$('#updSubjectModal').modal('show');
			$('.details-body').html(html);
		}
	})
})

//save or update the subject details
function upd_subj_details()
{
	var id = $('#upd-id').val();
	var code = $('#upd-code').val();
	var desc = $('#upd-description').val();
	var time = $('#upd-time').val();
	var day = $('#upd-day').val();
	var sem = $('#upd-semester').val();
	var sy = $('#upd-school-year').val();
	var myData = 'id=' + id + '&code=' + code + '&description=' + desc + '&time=' + time + '&day=' + day + '&sem=' + sem + '&sy=' + sy;

	if(code != '' && desc != '' && time != '' && day != '' && sem != '' && sy != '')
	{
		$.ajax({
			type: 'POST',
			url: '../../control/upd_subject.php',
			data: myData,
			success: function(response)
			{
				if(response > 0)
				{
					//get the new list of subject
					$.ajax({
						url: '../../control/view_all_subject.php',
						success: function(html)
						{
							$('#subject-list-body').html(html);
							$('#upd-success').html('<center><i class="fas fa-check"></i> Subject details successfully updated.</center>');
				            $('#upd-success').show();
				            setTimeout(function(){
				                $('#upd-success').hide();
				            }, 1500)
						}
					})
				}else{
					//display alert when detect an empty data
				    $('#upd-error').html('<center><i class="fas fa-ban"></i> ERROR! Update Failed.</center>');
				    $('#upd-error').show();
				    setTimeout(function(){
				    	$('#upd-error').hide();
				    }, 2000)
				}
			}
		})
	}else{
		//display alert when detect an empty data
	    $('#upd-error').html('<center><i class="fas fa-ban"></i> ERROR! Please fill out all the data needed.</center>');
	    $('#upd-error').show();
	    setTimeout(function(){
	    	$('#upd-error').hide();
	    }, 2000)
	}
}

//remove subject
$('.remove_subj').on('click', function(){
	var id = $(this).attr('value');

	$.ajax({
		type: 'POST',
		url: '../../control/remove_subject.php',
		data: {id:id},

		success: function(response)
		{
			if(response > 0)
			{
				//get the new list of subject
				$.ajax({
					url: '../../control/view_all_subject.php',
					success: function(html)
					{
						$('#subject-list-body').html(html);
			            toastr.success('Subject successfully removed.');
					}
				})
				
			}else{
				toastr.error('Remove Failed.');
			}
		}
	})
})
</script>