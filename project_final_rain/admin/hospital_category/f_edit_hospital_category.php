<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      include("../../connect/conn.php");
      $host_cat_id = $_REQUEST['host_cat_id'];
      $sql = "select * from  hospital_category where host_cat_id = '$host_cat_id'";
      $res = $conn->query($sql);
      $row = $res->fetch_assoc();

      // $sql_host = "select * from hospital_category";
      // $res_host = $conn->query($sql_host);
    ?>
    <form method="post" action="edit.php">
      <input type="hidden" name="host_cat_id" value="<?php echo $row['host_cat_id'] ?>">


      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">pat_fname</label>
        <div class="col-sm-10">
          <input type="text" name="host_cat_name" class="form-control" value="<?php echo $row['host_cat_name'] ?>">
        </div>
      </div>


      <div class="form-group row">
        <input type="submit" value="ตกลง">
      </div>
    </form>

  </body>
</html>
