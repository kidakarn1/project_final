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
      $cat_id = $_REQUEST['cat_id'];
      $sql = "select * from personnel_category where cat_id = '$cat_id'";
      $res = $conn->query($sql);
      $row = $res->fetch_assoc();
    ?>
    <form method="post" action="edit.php">
      <input type="hidden" name="cat_id" value="<?php echo $row['cat_id'] ?>">
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">cat_name_eng</label>
        <div class="col-sm-10">
          <input type="text" name="cat_name_eng" class="form-control" value="<?php echo $row['cat_name_eng'] ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">cat_name_th</label>
        <div class="col-sm-10">
          <input type="text" name="cat_name_th" class="form-control" value="<?php echo $row['cat_name_th'] ?>">
        </div>
      </div>

      <div class="form-group row">
        <input type="submit" value="ตกลง">
      </div>
    </form>

  </body>
</html>
