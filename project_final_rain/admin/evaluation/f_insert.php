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

      $sql_ass_cat = "select * from assessment_category";
      $res_ass_cat  = $conn->query($sql_ass_cat);
    ?>
    <form method="post" action="insert.php">
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">eva_name</label>
        <div class="col-sm-10">
          <input type="text" name="eva_name" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">eva_description</label>
        <div class="col-sm-10">
          <input type="text" name="eva_description" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">eva_note</label>
        <div class="col-sm-10">
          <input type="text" name="eva_note" class="form-control">
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
