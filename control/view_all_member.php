<?php
session_start();
include '../config/dbcon.php';

//get the id of current user
$id = $_SESSION['id'];

//get all the users in tblfaculty except for the user account 
$displayData = mysqli_query($con, "SELECT tblfaculty.id, tblfaculty.user_id, tblfaculty.firstname, tblfaculty.lastname, tblfaculty.access, tblfaculty.dept_id, tbldepartment.dept_code FROM tblfaculty, tbldepartment WHERE tblfaculty.dept_id = tbldepartment.id AND tblfaculty.id != $id AND status != 0");
while ($row = mysqli_fetch_array($displayData)) 
{
    //set the role/account type of faculties
    if($row['access'] == 1){
      $role = 'Dean';
    }elseif($row['access'] == 2){
      $role = 'Teacher';
    }else{
      $role = 'Registrar';
    }

    echo 
    '<tr>
        <td><input type="checkbox" name="checklist" class="checklist" value="'.$row['id'].'"></td>
        <td>'.$row['user_id'].'</td>
        <td>'.$row['firstname'].'</td>
        <td>'.$row['lastname'].'</td>
        <td><center>'.$row['dept_code'].'</center></td>
        <td>'.$role.'</td>
        <td><center><a class="edit" href="#" value="'.$row['id'].'"><i class="fas fa-edit edit"></i> Edit</a> || <a class="remove" href="#" value="'.$row['id'].'"><i class="fas fa-trash"></i> Remove</a></center></td>
    </tr>';
}
?>

<script>
//get the member details
$('.edit').on('click', function(){
  var id = $(this).attr('value');

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

//remove button function
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
        alert('Removed Failed. Please contact the system administrator for assistance.');
      }
    }
  })
})
</script>