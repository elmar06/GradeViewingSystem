<?php include '../../includes/Registrar_Header.php'?>
 <div class="container-fluid">
    <div class="card">
        <div class="card-body">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#enroll" role="tab"><span class="mdi mdi-clock-alert"></span> Enroll</a> </li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#requestTabPanel" role="tab"><span class="mdi mdi-format-list-numbers"></span> Student List</a> </li>
          </ul>
          <!-- Student List tab pane -->
          <div class="tab-content tabcontent-border">
            <div class="tab-pane" id="requestTabPanel" role="tabpanel"><br>
              <div><h4 class="page-title" style="color: green">&nbsp; Student List</h4></div><br>
                <div class="col-lg-12">
                  <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#addStudentModal"><i class="fas fa-user-plus"></i> Add Student</button>
                </div>
                <div class="col-lg-12">
                  <div class="container-fluid mb-3 mt-3" >
                      <table class="table table-striped mydatatable" style="width: 100%">
                          <thead class="thead" style="background-color: green;">
                              <tr class="btn-success">
                                  <th><center>Student ID</center></th>
                                  <th>Firstname</th>
                                  <th>Lastname</th>
                                  <th>Course</th>
                                  <th><center>Department</center></th>
                                  <th><center>Action</center></th>
                              </tr>
                          </thead>
                          <tbody id="student-list-body">
                          <?php 
                              //get all the subject
                              $get_student = mysqli_query($con, "SELECT * FROM tblstudent WHERE std_stat != 0 ORDER BY std_no_id ASC");
                              while ($row = mysqli_fetch_array($get_student)) 
                              {
                                echo 
                                '<tr>
                                    <td><center>'.$row['std_no_id'].'</center></td>
                                    <td>'.$row['std_fn'].'</td>
                                    <td>'.$row['std_ln'].'</td>
                                    <td>'.$row['std_course'].'</td>
                                    <td><center>'.$row['std_dept'].'</center></td>
                                    <td><center><a class="edit" href="#" value="'.$row['id'].'"><i class="fas fa-edit edit"></i> Edit</a> || <a class="remove_student" href="#" value="'.$row['id'].'"><i class="fas fa-trash"></i> Remove</a></center></td>
                                </tr>';
                              }
                          ?>
                          </tbody>
                      </table>
                  </div>
              </div>
            </div><!-- end of tabpanel student List -->

            <!-- Enroll Tab pane -->    
            <div class="tab-pane active" id="enroll" role="tabpanel"><br>
              <div><h4 class="page-title" style="color: green">&nbsp; Enroll Students</h4></div><br>
                <div class="container-fluid mb-3 mt-3">  
                  <div class="row"> 
                    <div class="col-lg-6">
                      <div class="form-group">
                          <select type="text" class="form-control select2" id="student" style="width: 100%">
                            <option value="0" disabled selected>Select Student</option>
                            <?php
                              $get = mysqli_query($con, "SELECT * FROM tblstudent WHERE std_stat != 0 ORDER BY std_ln ASC");
                              while($row = mysqli_fetch_array($get))
                              {
                                $fullname = $row['std_ln'].', '.$row['std_fn'];
                                echo '<option value="'.$row['id'].'">'.$fullname.'</option>';
                              }
                            ?>
                          </select>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                          <select type="text" class="form-control select2" id="sy" style="width: 100%" disabled>
                            <option value="0" disabled>Select School Year</option>
                            <?php
                              //-3 current year
                              $three_year = date('Y', strtotime('-3 year'));
                              $Three_year = date('Y', strtotime('-2 year'));
                              $past_years = 'SY '.$three_year.'-'.$Three_year;//format the string (SY 2018-2019)
                              //-2 current year
                              $two_year = date('Y', strtotime('-2 year'));
                              $Two_year = date('Y', strtotime('-1 year'));
                              $past = 'SY '.$two_year.'-'.$Two_year;//format the string (SY 2018-2019)
                              //-1 current year
                              $one_year = date('Y', strtotime('-1 year'));
                              $One_year = date('Y');
                              $previous = 'SY '.$one_year.'-'.$One_year;//format the string (SY 2019-2020)
                              //get the current year
                              $current_year = date('Y');//current year
                              $next_year = date('Y', strtotime('+1 year'));//next year
                              $current = 'SY '.$current_year.'-'.$next_year;//format the string (SY 2020-2021)
                              echo '
                                <option>'.$past_years.'</option>
                                <option>'.$past.'</option>
                                <option>'.$previous.'</option>
                                <option selected>'.$current.'</option>';
                            ?>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row"> 
                    <div class="col-lg-6">
                      <div class="form-group">
                          <select type="text" class="form-control select2" id="subject" style="width: 100%">
                            <option value="0" disabled selected>Select Subject</option>
                            <?php
                              //get the list of subj based on current school year
                              //get the current year
                              $year = date('Y');
                              $current_year = date('Y');//current year
                              $next_year = date('Y', strtotime('+1 year'));//next year
                              $sy = 'SY '.$current_year.'-'.$next_year;//format the string (SY 2020-2021)
                                $get_subj = mysqli_query($con, "SELECT * FROM tblsubject WHERE subj_sy = '$sy' AND status != 0 ORDER BY subj_sem ASC");
                                while($row1 = mysqli_fetch_array($get_subj))
                                {
                                  echo '<option value="'.$row1['subj_id'].'">'.$row1['subj_code'].' | '.$row1['subj_day'].' | '.$row1['subj_time'].'</option>';
                                }
                            ?>
                          </select>
                      </div>
                    </div>
                     <div class="col-lg-2">
                      <div class="form-group">
                          <select type="text" class="form-control select2" id="semester" style="width: 100%">
                            <option value="0" disabled selected>Select Semester</option>
                            <option value="1st Sem">1st Semester</option>
                            <option value="2nd Sem">2nd Semester</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <button class="btn btn-primary" onclick="enroll_subject()"><i class="fas fa-check-circle"></i></button>
                      </div>
                    </div>
                  </div>
                  <!-- enrolled subject table -->
                  <div class="table-responsive table-sm">
                    <table class="table table-bordered">
                      <thead class="thead-light">
                          <tr>
                            <th><center>Code</center></th>
                            <th><center>Description</center></th>
                            <th><center>Time</center></th>
                            <th><center>Day</center></th>
                            <th><center>Semester</center></th>
                            <th><center>Action</center></th>
                          </tr>
                      </thead>
                      <tbody id="tblsubject-body">

                      </tbody>
                    </table>
                  </div>

                </div>         
            </div><!-- end of ENROLL tabpane -->
          </div><!-- end of tab-content -->
    </div><!-- end of card-body -->
  </div><!-- end of card -->
</div><!-- end of container fluid -->

<!-- ADD Member Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-file-alt"></i> Subject Details</h5>
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
                <label for="exampleInputEmail1">lastname</label>
                <input type="text" class="form-control" id="lastname">
            </div>
          </div>
        </div> 
        <div class="row">
         <div class="col-lg-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Course</label>
                <input type="text" class="form-control" id="course">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Department</label>
                <select type="text" class="form-control" id="department">
                  <option value="0" disabled selected>Select Department</option>
                  <option value="SCS">SCS</option>
                  <option value="STE">STE</option>
                  <option value="SLS">SLS</option>
                  <option value="SBS">SBS</option>
                </select>
            </div>
          </div>
        </div>
        <div id="add-success" class="alert alert-success" role="alert" style="display: none"></div>  
        <div id="add-error" class="alert alert-danger" role="alert" style="display: none"></div>                                          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="add_student()">Add</button>
      </div>
    </div>
  </div>
</div>

<!-- Update Member Details Modal -->
<!-- Modal -->
<div class="modal fade" id="updStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-primary" onclick="upd_student_details()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php include '../../includes/Registrar_Footer.php'?>
<!-- page funtion and js for student page -->
<?php include 'js/student-js.php'?>