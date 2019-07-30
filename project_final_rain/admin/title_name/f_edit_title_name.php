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
      $title_id = $_REQUEST['title_id'];
      $sql_title_name = "select * from title_name where title_id = '$title_id'";
      $res_title_name = $conn->query($sql_title_name);
      $row = $res_title_name->fetch_assoc();
    ?>
    <form method="post" action="edit.php">
      <input type="hidden" name="title_id" value="<?php echo $row['title_id'] ?>">
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">title_name</label>
        <div class="col-sm-10">
          <input type="text" name="title_name" class="form-control" value="<?php echo $row['title_name'] ?>">
        </div>
      </div>

      <div class="form-group row">
        <input type="submit" value="ตกลง">
      </div>
    </form>

  </body>
</html>
