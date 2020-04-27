<script>
//add member function
function add_member()
{

    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var username = $('#username').val();
    var dept_id = $('#department').val();
    var access = $('#role').val();
    var dept_name = $('#department option:selected').text();
    var myData = 'firstname=' + firstname + '&lastname=' + lastname + '&username=' + username + '&dept_id=' + dept_id + '&access=' + access + '&dept_name='+ dept_name;
    //check if not null or empty
    if(username != '' && lastname != '' && username != '' && dept_id != 0 && access != 0)
    {
        $.ajax({
        type: 'POST',
        url: '../../control/add_member.php',
        data: myData,
        success: function(response)
        {
            if(response > 0){
            //get the updated list after the process
            $.ajax({
                url: '../../control/view_all_member.php',
                success: function(html)
                {
                    $('#member-list-body').fadeOut();
                    $('#member-list-body').fadeIn();
                    $('#member-list-body').html(html);
                    $('#add-success').html('<center><i class="fas fa-check"></i> Member successfully added.</center>');
                    $('#add-success').show();
                    setTimeout(function(){
                        $('#add-success').hide();
                    }, 1500)
                }
            })
            }else{
            //display alert when encounter an error in database
            $('#add-error').html('<center><i class="fas fa-ban"></i> ERROR! Failed to add Faculty Member.</center>');
            $('#add-error').show();
            setTimeout(function(){
                $('#add-error').hide();
            }, 2500)
            }
        }
        })
    }
    else
    {
        //display alert when empty data 
        $('#add-error').html('<center><i class="fas fa-ban"></i> ERROR! Please fill out all the data needed.</center>');
        $('#add-error').show();
        setTimeout(function(){
        $('#add-error').hide();
        }, 2500)
    }
}

//get the member details
$('.edit').click(function(){
var id = $(this).attr('value');
alert(id);
    $.ajax({
        type: 'POST',
        url: '../../control/get_member_details.php',
        data: {id:id},
        success: function(html)
        {
        $('#updDetailsModal').modal('show');//display or show modal
        $('.details-body').html(html);//display the data in modal body
        }
    })
})
//update member details
function upd_member()
{
var id = $('#upd-id').val();
var ins_id = $('#upd-member-id').val();
var firstname = $('#upd-firstname').val();
var lastname = $('#upd-lastname').val();
var username = $('#upd-username').val();
var dept_id = $('#upd-department').val();
var access = $('#upd-role').val();
var myData = 'id=' + id + '&user_id=' + ins_id + '&firstname=' + firstname + '&lastname=' + lastname + '&username=' + username + '&dept_id=' + dept_id + '&access=' + access;

//check if not null or empty
if(ins_id != '' && username != '' && lastname != '' && username != '' && dept_id != 0 && access != 0)
{
    $.ajax({
    type: 'POST',
    url: '../../control/upd_member.php',
    data: myData,
    success: function(response)
    {
        if(response > 0){
        //get the updated list after the process
        $.ajax({
            url: '../../control/view_all_member.php',
            success: function(html)
            {
            $('#member-list-body').fadeOut();
            $('#member-list-body').fadeIn();
            $('#member-list-body').html(html);
            $('#upd-success').html('<center><i class="fas fa-check"></i> Member details successfully updated.</center>');
            $('#upd-success').show();
            setTimeout(function(){
                $('#upd-success').hide();
            }, 1500)
            }
        })
        }else{
        //display alert when encounter an error in database
        $('#upd-error').html('<center><i class="fas fa-ban"></i> ERROR! Update Failed. Please contact the system administrator.</center>');
        $('#upd-error').show();
        setTimeout(function(){
            $('#upd-error').hide();
        }, 2500)
        }
    }
    })
}
else
{
    //display alert when detect an empty data
    $('#upd-error').html('<center><i class="fas fa-ban"></i> ERROR! Please fill out all the data needed.</center>');
    $('#upd-error').show();
    setTimeout(function(){
    $('#upd-error').hide();
    }, 2500)
}
}

//remove member button function
$('.remove').on('click', function(){
//get the id of user
var id = $(this).attr('value');

    $.ajax({
        type: 'POST',
        url: '../../control/remove_member.php',
        data: {id: id},
        success: function(response)
        {
            if(response > 0){
                //get the updated list after the process
                $.ajax({
                url: '../../control/view_all_member.php',
                success: function(html)
                {
                    $('#member-list-body').fadeOut();
                    $('#member-list-body').fadeIn();
                    $('#member-list-body').html(html);
                }
                })
            }else{
                 toastr.error('ERROR! Removing Failed.');
            }
        }
    })
})
//reset password function
function reset_password()
{
    //get the id per checked checkbox 
    var id = []
    $('input:checkbox[name=checklist]:checked').each(function() {
        id.push($(this).val())
    });

    if(id.length > 0){
        $.each( id, function( key, value ) {
            $.ajax({
                type: 'POST',
                url: '../../control/reset_password.php',
                data: {id:value},
                success: function(response)
                {
                    if(response > 0)
                    {
                         toastr.success('Faculty Member password successfully reseted.');
                    }else{
                         toastr.error('Reset Failed. Please contact the system administrator.');
                    }
                }
            })
        })
    }else{
        toastr.error('ERROR! No member selected.');
    } 
}

//get the teacher details to be assign a subject
function get_teacher_details()
{
    var id = []
    $('input:checkbox[name=checklist]:checked').each(function() {
        id.push($(this).val())
    });

    if(id.length == 1){
        $.ajax({
            type: 'POST',
            url: '../../control/get_teacher_details.php',
            data: {id:id},
            success: function(html)
            {
                $('#teacherDetailsModal').modal('show');
                $('#teacher-body').html(html);
            }
        })
    }else if(id.length > 1){//check if user check 2 or more checkbox
        toastr.error('ERROR! You choose 2 or more member.');
    }else{
        toastr.error('ERROR! No teacher is selected.');
    }
}
</script>