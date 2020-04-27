<?php include '../../includes/Registrar_Header.php'?>
  <div class="container">
    <div class="row" style="margin-left: -100px; margin-right: -100px">
        <!-- buttons -->
        <div class="col-lg-12">
            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#addMemberModal"><i class="fas fa-plus"></i> Add Member</button>
            <button type="button" class="btn btn-primary pull-right" onclick="get_teacher_details()"><i class="fas fa-folder-plus"></i> Assign Subject</button>
            <button type="button" class="btn btn-warning pull-right" onclick="reset_password()"><i class="fas fa-undo"></i> Reset Password</button>
        </div>
        <!--DATATABLE TEACHER CONTENT START-->
        <div class="col-lg-12">
            <div class="container-fluid mb-3 mt-3" >
                <table class="table table-striped mydatatable" style="width: 100%">
                    <thead class="thead" style="background-color: green;">
                        <tr class="btn-success">
                            <th style="width: 3%"><input type="checkbox" class="checkboxall"/><span class="checkmark"></span></th>
                            <th>Faculty ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th><center>Department</center></th>
                            <th>Role</th>
                            <th><center>Action</center></th>
                        </tr>
                    </thead>
                    <tbody id="member-list-body">
                    <?php 
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
                    </tbody>
                </table>
            </div>
        </div>      
    </div>
  </div>

<!-- ADD Member Modal -->
<div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-address-card"></i> Member Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Firstname</label>
                    <input type="text" class="form-control" id="firstname">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Lastname</label>
                    <input type="text" class="form-control" id="lastname">
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="username">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" value="123456" disabled></input>
                </div>
            </div>
          </div> 
          <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Department</label>
                    <select type="text" class="form-control" id="department">
                        <option value="0" disabled selected>Select Department</option>
                        <option value="1">SCS</option>
                        <option value="2">STE</option>
                        <option value="3">SLS</option>
                        <option value="4">SBS</option>
                        <option value="5">REG</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Role</label>
                    <select type="text" class="form-control" id="role">
                        <option value="0" disabled selected>Select Role</option>
                        <option value="1">Dean</option>
                        <option value="2">Teacher</option>
                        <option value="3">Registrar</option>
                    </select>
                </div>
            </div>
          </div>
          <div id="add-success" class="alert alert-success" role="alert" style="display: none"></div>  
          <div id="add-error" class="alert alert-danger" role="alert" style="display: none"></div>                                          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="add_member()">Add</button>
      </div>
    </div>
  </div>
</div>

<!-- Update Member Details Modal -->
<div class="modal fade" id="updDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body details-body">
        <!-- details will be displayed in here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="upd_member()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Assign Teacher Subject Modal -->
<div class="modal fade" id="teacherDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assign Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="teacher-body" class="modal-body">
        <!-- details will be displayed in here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php include '../../includes/Registrar_Footer.php'?>
<!-- page function and js of faculty page-->
<?php include 'js/faculty-js.php'?>