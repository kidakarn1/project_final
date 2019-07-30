<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      include("../../connect/conn.php");
      $ass_cat_id = $_REQUEST['ass_cat_id'];
      $sql = "select * from assessment_category where
      ass_cat_id = '$ass_cat_id'";
      $res = $conn->query($sql);
      $row = $res->fetch_assoc();
    ?>
    <form method="post" action="edit.php">
      <input type="hidden" name="ass_cat_id" value="<?php echo $row['ass_cat_id'] ?>">
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">hos_name</label>
        <div class="col-sm-10">
          <input type="text" name="ass_cat_name" class="form-control" value="<?php echo $row['ass_cat_name'] ?>">
        </div>
      </div>
      <div class="form-group row">
        <input type="submit" value="ตกลง">
      </div>
    </form>

  </body>
</html>
