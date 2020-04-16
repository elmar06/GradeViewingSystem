<?php
session_start();
include '../config/dbcon.php';

$id = $_POST['id'];

$query = mysqli_query($con, "SELECT tblfaculty.id as 'mem-id', tblfaculty.user_id, tblfaculty.firstname, tblfaculty.lastname, tblfaculty.username, tblfaculty.dept_id, tblfaculty.access, tbldepartment.dept_code FROM tblfaculty, tbldepartment WHERE tblfaculty.id = '$id' AND tblfaculty.dept_id = tbldepartment.id");

while($row = mysqli_fetch_array($query))
{
    echo '
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Member ID</label>
                    <input type="text" class="form-control" id="upd-member-id" value="'.$row['user_id'].'">
                    <input type="text" class="form-control" id="upd-id" value="'.$row['mem-id'].'" hidden>
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Firstname</label>
                    <input type="text" class="form-control" id="upd-firstname" value="'.$row['firstname'].'">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Lastname</label>
                    <input type="text" class="form-control" id="upd-lastname" value="'.$row['lastname'].'">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="upd-username" value="'.$row['username'].'">
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
                    <select type="text" class="form-control" id="upd-department">
                        <option value="0" disabled selected>Select Department</option>';
                        if($row['dept_id'] == 1){
                            echo '
                                <option value="1" selected>SCS</option>
                                <option value="2">STE</option>
                                <option value="3">SLS</option>
                                <option value="4">SBS</option>
                                <option value="5">REG</option>';
                        }elseif($row['dept_id'] == 2){
                            echo '
                                <option value="1">SCS</option>
                                <option value="2" selected>STE</option>
                                <option value="3">SLS</option>
                                <option value="4">SBS</option>
                                <option value="5">REG</option>';
                        }elseif($row['dept_id'] == 3){
                            echo '
                                <option value="1">SCS</option>
                                <option value="2">STE</option>
                                <option value="3" selected>SLS</option>
                                <option value="4">SBS</option>
                                <option value="5">REG</option>';
                        }elseif($row['dept_id'] == 4){
                            echo '
                                <option value="1">SCS</option>
                                <option value="2">STE</option>
                                <option value="3">SLS</option>
                                <option value="4" selected>SBS</option>
                                <option value="5">REG</option>';
                        }else{
                            echo '
                                <option value="1" selected>SCS</option>
                                <option value="2">STE</option>
                                <option value="3">SLS</option>
                                <option value="4">SBS</option>
                                <option value="5" selected>REG</option>';
                        }
                    echo '</select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Role</label>
                    <select type="text" class="form-control" id="upd-role">
                    <option value="0" disabled selected>Select Role</option>';
                        if($row['access'] == 1){
                            echo '
                                <option value="1" selected>Dean</option>
                                <option value="2">Teacher</option>
                                <option value="3">Registrar</option>';
                        }elseif($row['access'] == 2){
                            echo '
                                <option value="1">Dean</option>
                                <option value="2" selected>Teacher</option>
                                <option value="3">Registrar</option>';
                        }elseif($row['access'] == 3){
                            echo '
                                <option value="1">Dean</option>
                                <option value="2">Teacher</option>
                                <option value="3" selected>Registrar</option>';
                        }
                    echo '</select>
                </div>
            </div>
        </div>
        <div id="upd-success" class="alert alert-success" role="alert" style="display: none"></div>  
        <div id="upd-error" class="alert alert-danger" role="alert" style="display: none"></div>';
}

?>