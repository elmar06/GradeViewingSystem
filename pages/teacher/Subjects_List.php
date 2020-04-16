<?php include '../../includes/Teacher_Header.php'?>
<div class="container">
    <div class="row" style="margin-left: -100px; margin-right: -100px">
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
                        </tr>
                    </thead>
                    <tbody id="subject-list-body">
                    <?php 
                        $id = $_SESSION['id'];
                        //get all the subject assign in teacher
                        $get_subject = mysqli_query($con, "SELECT tblsubject.subj_id, tblsubject.subj_code, tblsubject.subj_desc, tblsubject.subj_time, tblsubject.subj_day, tblsubject.subj_sem, tblsubject.subj_sy FROM tblsubject, tblassign WHERE tblassign.subj_id = tblsubject.subj_id AND tblassign.teacher_id = '$id' AND tblassign.status != 0 ORDER BY tblsubject.subj_sy DESC");
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
                          </tr>';
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>      
    </div>
  </div>
<?php include '../../includes/Teacher_Footer.php'?>