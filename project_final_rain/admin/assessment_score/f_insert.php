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
        <label for="inputPassword" class="col-sm-2 col-form-label">ass_score_id</label>
        <div class="col-sm-10">
          <input type="text" name="ass_score_id" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">ass_score_description</label>
        <div class="col-sm-10">
          <input type="text" name="ass_score_description" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">ass_score</label>
        <div class="col-sm-10">
          <input type="number" name="ass_score" class="form-control">
        </div>
      </div>


      <div class="form-group row">
        <input type="submit" value="ตกลง">
      </div>
    </form>

  </body>
</html>
