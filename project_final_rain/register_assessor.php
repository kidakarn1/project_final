<?php
  include('connect/conn.php');
  $sql_get_title_name = "select * from title_name";
  $res_get_title_name=$conn->query($sql_get_title_name);
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
  <body>
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myExtraLargeModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" >
    <div class="container">

    <div class="form-horizontal">
      <div class="form-group row">
        <label class="offset-sm-3 col-sm-2 col-form-label">เลขบัตรประชาชน</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="id_card_number"  maxlength="13" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="offset-sm-3 col-sm-2 col-form-label">ชื่อผู้ใช้</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" name="per_username" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="offset-sm-3 col-sm-2 col-form-label">รหัสผ่าน</label>
        <div class="col-sm-4">
        <input type="password" class="form-control" name="per_password"required>
        </div>
      </div>
      <div class="form-group row">
        <label class="offset-sm-3 col-sm-2 col-form-label">คำนำหน้าชื่อ</label>
        <div class="col-sm-4">
        <select class="form-control" id="title_id" name="title_id">
          <?php while ($row_get_title_name = $res_get_title_name->fetch_assoc()) { ?>
            <option value="<?php echo $row_get_title_name['title_id'];?>"><?php echo $row_get_title_name['title_name'];?>
          <?php } ?>
        </select>
        </div>
      </div>

      <div class="form-group row">
        <label class="offset-sm-3 col-sm-2 col-form-label">ชื่อ</label>
        <div class="col-sm-4">
        <input class="form-control" type="text" name="per_fname" required>
        </div>
      </div>

      <div class="form-group row">
        <label class="offset-sm-3 col-sm-2 col-form-label">นามสกุล</label>
        <div class="col-sm-4">
        <input class="form-control" type="text" name="per_lname"required>
        </div>
      </div>

      <div class="form-group row">
        <label class="offset-sm-3 col-sm-2 col-form-label">อีเมลล์</label>
        <div class="col-sm-4">
        <input class="form-control" type="email" name="per_email" required>
        </div>
      </div>

      <div class="form-group row">
        <label class="offset-sm-3 col-sm-2 col-form-label">เบอร์โทรศัพท์</label>
        <div class="col-sm-4">
        <input class="form-control" type="number" name="per_phone" min="0"  required>
        </div>
      </div>

      <div class="form-group row">
        <label class="offset-sm-3 col-sm-2 col-form-label">หน่วยงาน</label>
        <div class="col-sm-4">
        <input class="form-control" type="text" name="per_department" required>
        </div>
      </div>

      <div class="form-group row">
        <div class="offset-sm-6">
          <button class="btn btn-success" type="button" name="button" onclick="register_assessor()">ยืนยัน</button>
          <button class="btn btn-danger" type="button" name="button" onclick="reset_assessor()">ยกเลิก</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save changes</button>
  </div>
</div>
</div>
</div>
</div>
  </body>
</html>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="js/javascript_stream_th.js"></script>
