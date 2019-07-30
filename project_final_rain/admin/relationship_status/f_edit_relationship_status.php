<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      include("../../connect/conn.php");
      $rel_id = $_REQUEST['rel_id'];
      $sql = "select * from relationship_status where rel_id = '$rel_id'";
      $res = $conn->query($sql);
      $row = $res->fetch_assoc();
    ?>
    <form method="post" action="edit.php">
      <input type="hidden" name="rel_id" value="<?php echo $row['rel_id'] ?>">
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">rel_name</label>
        <div class="col-sm-10">
          <input type="text" name="rel_name" class="form-control" value="<?php echo $row['rel_name'] ?>">
        </div>
      </div>

      <div class="form-group row">
        <input type="submit" value="ตกลง">
      </div>
    </form>

  </body>
</html>
