<script >
$('.mydatatable').DataTable();//Datatable initialization

//adding of grade
//get the student details and show the modal function
$('.add_grade').on('click', function(){
	var id = $(this).attr('value');

	$.ajax({
		type: 'POST',
		url: '../../control/get_grade_details.php',
		data: {id:id},

		success:function(html)
		{
			$('#gradeModal').modal('show');
			$('.grade-body').html(html);
		}
	})
})

//save student grade
function save_grade()
{
	var id = $('#id').val();
	var midterm = $('#midterm').val();
	var final = $('#final').val();
	var myData = 'id=' + id + '&midterm=' + midterm + '&final=' + final;

	$.ajax({
		type: 'POST',
		url: '../../control/add_grade.php',
		data: myData,

		success: function(response)
		{
			if(response > 0)
			{
				//get the updated list and grade of student
				$.ajax({
					url: '../../control/view_all_grade.php',
					success: function(html)
					{
						$('#grade-list-body').fadeOut();
						$('#grade-list-body').fadeIn();
						$('#grade-list-body').html(html);
						//show the success message
						$('#add-success').html('<center><i class="fas fa-check"></i> Student grade successfully added.</center>');
			            $('#add-success').show();
			            setTimeout(function(){
			                $('#add-success').hide();
			            }, 1500)
					}
				})
			}
			else
			{
				$('#add-error').html('<center><i class="fas fa-ban"></i> Adding of Grade Failed. Please contact the system administrator for assistance.</center>');
	            $('#add-error').show();
	            setTimeout(function(){
	                $('#add-error').hide();
	            }, 2000)
			}
		}
	})
}
</script>