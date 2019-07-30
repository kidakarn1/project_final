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
      $id_card_number = $_REQUEST['id_card_number'];
      $sql = "select * from personnel,personnel_category,title_name where
      id_card_number = '$id_card_number' and
      personnel.cat_id = personnel_category.cat_id and
      personnel.title_id = title_name.title_id";
      $res = $conn->query($sql);
      $row = $res->fetch_assoc();

      $sql_title_name = "select * from title_name";
      $res_title_name = $conn->query($sql_title_name);

      $personnel_category = "select * from personnel_category";
      $personnel_category = $conn->query($personnel_category);
    ?>
    <form method="post" action="edit.php">
      <input type="hidden" name="id_card_number" value="<?php echo $row['id_card_number'] ?>">
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
          <input type="text" name="per_fname" class="form-control" value="<?php echo $row['per_fname'] ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">per_lname</label>
        <div class="col-sm-10">
          <input type="text" name="per_lname" class="form-control" value="<?php echo $row['per_lname'] ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">per_email</label>
        <div class="col-sm-10">
          <input type="text" name="per_email" class="form-control" value="<?php echo $row['per_email'] ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">per_phone</label>
        <div class="col-sm-10">
          <input type="text" name="per_phone" class="form-control" value="<?php echo $row['per_phone'] ?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">per_department</label>
        <div class="col-sm-10">
          <input type="text" name="per_department" class="form-control" value="<?php echo $row['per_department'] ?>">
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
