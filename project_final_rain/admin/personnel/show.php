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
    if ($_SESSION['cat_id'] == 'MG') {
      $sql = "select * from  personnel,personnel_category,title_name where
      personnel.cat_id = personnel_category.cat_id and
      personnel.title_id = title_name.title_id and
      personnel.cat_id = 'PT'";
      $res = $conn->query($sql);
    } else {
      $sql = "select * from  personnel,personnel_category,title_name where
      personnel.cat_id = personnel_category.cat_id and
      personnel.title_id = title_name.title_id";
      $res = $conn->query($sql);
    }
    ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/fh-3.1.4/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.css"/>
    <div class="container">
      <div class="table-responsive">
        <table id="personnel" class="table table-striped table-bordered">
          <thead>
              <tr>
                <td>id_card_number</td>
                <td>per_username</td>
                <td>per_password</td>
                <td>title_id</td>
                <td>title_name</td>
                <td>per_fname</td>
                <td>per_lname</td>
                <td>per_email</td>
                <td>per_phone</td>
                <td>per_department</td>
                <td>cat_id</td>
                <td>cat_name_eng</td>
                <td>cat_name_th</td>
                <td>การจัดการ</td>
                <th><a href="f_insert.php">insert</a></th>
              </tr>
          </thead>
          <tbody>
            <?php while ($row = $res->fetch_assoc()) { ?>
            <tr>

              <td><?php echo $row['id_card_number']; ?></td>
              <td><?php echo $row['per_username']; ?></td>
              <td><?php echo $row['per_password']; ?></td>
              <td><?php echo $row['title_id']; ?></td>
              <td><?php echo $row['title_name']; ?></td>
              <td><?php echo $row['per_fname']; ?></td>
              <td><?php echo $row['per_lname']; ?></td>
              <td><?php echo $row['per_email']; ?></td>
              <td><?php echo $row['per_phone']; ?></td>
              <td><?php echo $row['per_department']; ?></td>
              <td><?php echo $row['cat_id']; ?></td>
              <td><?php echo $row['cat_name_eng']; ?></td>
              <td><?php echo $row['cat_name_th']; ?></td>
              <td>
                <!-- <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#show">
                </button> -->
                  <a href="f_edit_personnel.php?id_card_number=<?php echo $row['id_card_number'];?>">แก้ไข</a>
              </td>
              <td>
                  <a href="delete.php?id_card_number=<?php echo $row['id_card_number'];?>">ลบ</a>
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
      $('#personnel').DataTable();
 });
 </script>
