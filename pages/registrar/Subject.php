<?php include '../../includes/Registrar_Header.php'?>
  <div class="container">
    <div class="row" style="margin-left: -100px; margin-right: -100px">
        <!-- buttons -->
        <div class="col-lg-12">
            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#addSubjectModal"><i class="fas fa-file-medical"></i> Add Subject</button>
        </div>
        <!--DATATABLE TEACHER CONTENT START-->
        <div class="col-lg-12">
            <div class="container-fluid mb-3 mt-3" >
                <table class="table table-striped mydatatable" style="width: 100%">
                    <thead class="thead" style="background-color: green;">
                        <tr class="btn-success">
                            <th style="width: 3%"><input type="checkbox" class="checkboxall"/><span class="checkmark"></span></th>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Time</th>
                            <th>Day</th>
                            <th><center>Semester</center></th>
                            <th><center>SY</center></th>
                            <th><center>Action</center></th>
                        </tr>
                    </thead>
                    <tbody id="subject-list-body">
                    <?php 
                        //get all the subject
                        $get_subject = mysqli_query($con, "SELECT * FROM tblsubject WHERE status != 0 ORDER BY subj_sem ASC");
                        while ($row = mysqli_fetch_array($get_subject)) 
                        {
                          echo 
                          '<tr>
                              <td><input type="checkbox" name="checklist" class="checklist" value="'.$row['subj_id'].'"></td>
                              <td>'.$row['subj_code'].'</td>
                              <td>'.$row['subj_desc'].'</td>
                              <td>'.$row['subj_time'].'</td>
                              <td>'.$row['subj_day'].'</td>
                              <td><center>'.$row['subj_sem'].'</center></td>
                              <td><center>'.$row['subj_sy'].'</center></td>
                              <td><center><a class="edit_subj" href="#" value="'.$row['subj_id'].'"><i class="fas fa-edit edit"></i> Edit</a> || <a class="remove_subj" href="#" value="'.$row['subj_id'].'"><i class="fas fa-trash"></i> Remove</a></center></td>
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
<div class="modal fade" id="addSubjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <label for="exampleInputEmail1">Code</label>
                    <input type="text" class="form-control" id="code">
                </div>
            </div>
          </div> 
          <div class="row">
            <div class="col-lg-12">
               <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea type="text" class="form-control" id="description"></textarea>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Time</label>
                    <input type="text" class="form-control" id="time">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Day</label>
                    <input type="text" class="form-control" id="day">
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Semester</label>
                    <input type="text" class="form-control" id="semester">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">School Year</label>
                    <input type="text" class="form-control" id="school-year"></input>
                </div>
            </div>
          </div> 
          <div id="add-success" class="alert alert-success" role="alert" style="display: none"></div>  
          <div id="add-error" class="alert alert-danger" role="alert" style="display: none"></div>                                          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="add_subject()">Add</button>
      </div>
    </div>
  </div>
</div>

<!-- Update Member Details Modal -->
<!-- Modal -->
<div class="modal fade" id="updSubjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Subject Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body details-body">
        <!-- details will be displayed in here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="upd_subj_details()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php include '../../includes/Registrar_Footer.php'?>
<!-- page function and js of subject page-->
<?php include 'js/subject-js.php'?>