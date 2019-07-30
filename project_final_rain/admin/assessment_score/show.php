<?php $a = 'admin'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include("../../connect/conn.php");
    include("../../menu.php");
    ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/fh-3.1.4/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.css"/>
    <div class="container">
      <div class="table-responsive">
        <table id="assessment_score" class="table table-striped table-bordered">
          <thead>
              <tr>
                <th>ass_score_id</th>
                <th>ass_score_description</th>
                <th>ass_score</th>

                <th>การจัดการ</th>
                <th><a href="f_insert.php">insert</a></th>
              </tr>
          </thead>
          <?php
          $sql = "select * from assessment_score";
          $res = $conn->query($sql);
          ?>
          <tbody>
            <?php while ($row = $res->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $row['ass_score_id']; ?></td>
              <td><?php echo $row['ass_score_description']; ?></td>
              <td><?php echo $row['ass_score']; ?></td>


              <td>
                <!-- <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#show">
                </button> -->
                  <a href="f_edit_assessment_score.php?ass_score_id=<?php echo $row['ass_score_id'];?>">แก้ไข</a>
              </td>
              <td>
                  <a href="delete.php?ass_score_id=<?php echo $row['ass_score_id'];?>">ลบ</a>
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
      $('#assessment_score').DataTable();
 });
 </script>
