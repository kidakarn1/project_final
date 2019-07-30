<?php $a = 'admin'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      include("../../menu.php");
    ?>
    <form method="post" action="insert.php">
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">cat_id</label>
        <div class="col-sm-10">
          <input type="text" name="cat_id" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">cat_name_eng</label>
        <div class="col-sm-10">
          <input type="text" name="cat_name_eng" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">cat_name_th</label>
        <div class="col-sm-10">
          <input type="text" name="cat_name_th" class="form-control">
        </div>
      </div>

      <div class="form-group row">
        <input type="submit" value="ตกลง">
      </div>
    </form>

  </body>
</html>
