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
      $sql = "select * from personnel,personnel_category,title_name";
      $res = $conn->query($sql);
      $row = $res->fetch_assoc();

      $sql_title_name = "select * from title_name";
      $res_title_name = $conn->query($sql_title_name);

      $personnel_category = "select * from personnel_category";
      $personnel_category = $conn->query($personnel_category);
    ?>
    <form method="post" action="insert.php">
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">id_card_number</label>
        <div class="col-sm-10">
          <input type="text" name="id_card_number" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">per_username</label>
        <div class="col-sm-10">
          <input type="text" name="per_username" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">per_password</label>
        <div class="col-sm-10">
          <input type="text" name="per_password" class="form-control">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">title_id</label>
        <select class="col-sm-10" name="title_id">
          <?php while($row_title_name = $res_title_name->fetch_assoc()) { ?>
            <option value="<?php echo $row_title_name['title_id'];?>"><?php echo $row_title_name['title_name']; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">per_fname</label>
        <div class="col-sm-10">
          <input type="text" name="per_fname" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">per_lname</label>
        <div class="col-sm-10">
          <input type="text" name="per_lname" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">per_email</label>
        <div class="col-sm-10">
          <input type="text" name="per_email" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">per_phone</label>
        <div class="col-sm-10">
          <input type="text" name="per_phone" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">per_department</label>
        <div class="col-sm-10">
          <input type="text" name="per_department" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">cat_id</label>
        <select class="col-sm-10" name="cat_id">
          <?php while($row_personnel_category = $personnel_category->fetch_assoc()) { ?>
            <option value="<?php echo $row_personnel_category['cat_id'];?>"><?php echo $row_personnel_category['cat_name_th']; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group row">
        <input type="submit" value="ตกลง">
      </div>
    </form>

  </body>
</html>
