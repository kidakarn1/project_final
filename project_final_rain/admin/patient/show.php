<?php $a = 'admin'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <?php
    include("../../connect/conn.php");
    include("../../menu.php");
    ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/fh-3.1.4/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.css"/>
    <div class="container">
      <div class="table-responsive">
        <table id="patient" class="table table-striped table-bordered">
          <thead>
              <tr>
                <th>hn</th>
                <th>title_id</th>
                <th>title_name</th>
                <th>pat_fname</th>
                <th>pat_lname</th>
                <th>age</th>
                <th>weight</th>
                <th>height</th>
                <th>career</th>
                <th>rel_id</th>
                <th>rel_name</th>
                <th>stroke_days</th>
                <th>doctor_diagnosis</th>
                <th>physical_therapy_diagnosis</th>
                <th>important_symptoms_patients</th>
                <th>history_of_physical_therapy_treatment</th>
                <th>warning</th>
                <th>congenital_disease</th>
                <th>drug_allergy_history</th>
                <th>hos_id</th>
                <th>hos_name</th>
                <th>host_cat_id</th>
                <th>host_cat_name</th>
                <th>id_card_number</th>
                <th>การจัดการ</th>
                <th><a href="f_insert.php">insert</a></th>
              </tr>
          </thead>
          <?php
          $sql = "select * from  patient,title_name,hospital,hospital_category,relationship_status where
          patient.title_id = title_name.title_id and
          patient.rel_id = relationship_status.rel_id and
          patient.hos_id = hospital.hos_id and
          hospital.host_cat_id = hospital_category.host_cat_id";
          $res = $conn->query($sql);
          ?>
          <tbody>
            <?php while ($row = $res->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $row['hn']; ?></td>
              <td><?php echo $row['title_id']; ?></td>
              <td><?php echo $row['title_name']; ?></td>
              <td><?php echo $row['pat_fname']; ?></td>
              <td><?php echo $row['pat_lname']; ?></td>
              <td><?php echo $row['birthday']; ?></td>
              <td><?php echo $row['weight']; ?></td>
              <td><?php echo $row['height']; ?></td>
              <td><?php echo $row['career']; ?></td>
              <td><?php echo $row['rel_id']; ?></td>
              <td><?php echo $row['rel_name']; ?></td>
              <td><?php echo $row['stroke_days']; ?></td>
              <td><?php echo $row['doctor_diagnosis']; ?></td>
              <td><?php echo $row['physical_therapy_diagnosis']; ?></td>
              <td><?php echo $row['important_symptoms_patients']; ?></td>
              <td><?php echo $row['history_of_physical_therapy_treatment']; ?></td>
              <td><?php echo $row['warning']; ?></td>
              <td><?php echo $row['congenital_disease']; ?></td>
              <td><?php echo $row['drug_allergy_history']; ?></td>
              <td><?php echo $row['hos_id']; ?></td>
              <td><?php echo $row['hos_name']; ?></td>
              <td><?php echo $row['host_cat_id']; ?></td>
              <td><?php echo $row['host_cat_name']; ?></td>
              <td><?php echo $row['id_card_number']; ?></td>
              <td>
                <!-- <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#show">
                </button> -->
                  <a href="f_edit_patient.php?hn=<?php echo $row['hn'];?>">แก้ไข</a>
              </td>
              <td>
                  <a href="delete.php?hn=<?php echo $row['hn'];?>">ลบ</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- Modal -->
    <!-- <div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myExtraLargeModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">title_id</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="Password" value="">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">per_fname</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">per_lname</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">per_email</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">per_phone</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">per_department</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">cat_id</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/fh-3.1.4/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>
  </body>
</html>
<script>
 $(document).ready(function(){
      $('#patient').DataTable();
 });
 </script>
