<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      include("../../connect/conn.php");
      $eva_id = $_REQUEST['eva_id'];
      $sql = "select * from evaluation where
      eva_id = '$eva_id'";
      $res = $conn->query($sql);
      $row = $res->fetch_assoc();


      $sql_ass_cat = "select * from assessment_category";
      $res_ass_cat  = $conn->query($sql_ass_cat);
    ?>
    <form method="post" action="edit.php">
      <input type="hidden" name="eva_id" value="<?php echo $row['eva_id'] ?>">

      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">eva_name</label>
        <div class="col-sm-10">
          <input type="text" name="eva_name" class="form-control" value="<?php echo $row['eva_name'] ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">eva_description</label>
        <div class="col-sm-10">
          <input type="text" name="eva_description" class="form-control" value="<?php echo $row['eva_description'] ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">eva_note</label>
        <div class="col-sm-10">
          <input type="text" name="eva_note" class="form-control" value="<?php echo $row['eva_note'] ?>">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">ass_cat_name</label>
        <select class="col-sm-10" name="ass_cat_id">
          <?php while ($row_ass_cat = $res_ass_cat->fetch_assoc()) { ?>
            <option value="<?php echo $row_ass_cat['ass_cat_id'] ?>"><?php echo $row_ass_cat['ass_cat_name'] ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group row">
        <input type="submit" value="ตกลง">
      </div>
    </form>

  </body>
</html>
