<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      include("../../connect/conn.php");
      $hos_id = $_REQUEST['hos_id'];
      $sql = "select * from hospital where
      hos_id = '$hos_id'";
      $res = $conn->query($sql);
      $row = $res->fetch_assoc();


      $sql_host = "select * from hospital_category";
      $res_host = $conn->query($sql_host);
    ?>
    <form method="post" action="edit.php">
      <input type="hidden" name="hos_id" value="<?php echo $row['hos_id'] ?>">

      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">hos_name</label>
        <div class="col-sm-10">
          <input type="text" name="hos_name" class="form-control" value="<?php echo $row['hos_name'] ?>">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">hos_status</label>
        <select class="col-sm-10" name="hos_status">
          <option value="1">อนุมัติให้ใช้งาน</option>
          <option value="0">ไม่อนุมัติให้ใช้งาน</option>
        </select>
      </div>

      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">host_cat_name</label>
        <select class="col-sm-10" name="host_cat_id">
          <?php while ($row_host = $res_host->fetch_assoc()) { ?>
            <option value="<?php echo $row_host['host_cat_id'] ?>"><?php echo $row_host['host_cat_name'] ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group row">
        <input type="submit" value="ตกลง">
      </div>
    </form>

  </body>
</html>
