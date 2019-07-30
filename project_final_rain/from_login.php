<?php
  session_start();
  if (isset($_SESSION['id_card_number'])){
    echo "<script> window.location.href='menu.php'</script>";
  }
  else {
 ?>
<html lang="en">
  <head>
      <title>Login V1</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <div class="login">
      <div class="limiter">
        <div class="container-login100">
          <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
              <img src="images/img-01.png" alt="IMG">
            </div>
            <div>
              <div class="login100-form validate-form">
                <span class="login100-form-title">
                  Member Login
                </span>
                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                  <!--<input class="input100" type="text" name="email" placeholder="Email">-->
                  <input class="input100" name="username" placeholder="username" type="text" />
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                  </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate = "required: Password">
                  <!-- <input class="input100" type="password" name="pass" placeholder="Password"> -->
                  <input class="input100" type="password" name="password" placeholder="password"/>
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                  </span>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" onclick="check_login()">
                        เข้าสู่ระบบ
                    </button>
                </div>
                <div class="text-center p-t-12">
                    <span class="txt1">
                        Forgot
                    </span>
                    <a class="txt2" href="#">
                        Username / Password?
                    </a>
                </div>
                <center>
                <button  type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-xl">
                  Create your Account
                  <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                </button>
              </center>

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
                        <?php
                          include('connect/conn.php');
                          $sql_get_title_name = "select * from title_name";
                          $res_get_title_name=$conn->query($sql_get_title_name);
                         ?>

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
                            <input type="password" class="form-control" name="per_password">
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

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-danger" type="button" name="button" onclick="reset_assessor()">Reset</button>
                        <button class="btn btn-success" type="button" name="button" onclick="register_assessor()">Save</button>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<?php
  }
?>
