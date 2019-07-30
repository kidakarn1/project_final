<?php
  session_start();
  if (isset($_SESSION['id_card_number'])){
    echo "<script> window.location.href='personnel/menu_personnel.php'</script>";
  }
  else {
 ?>
   <div class="login">
    <h1>เข้าสู่ระบบ</h1>
    <input name="username" placeholder="username" type="text" />
    <input name="password" placeholder="password" type="password" />
    <!-- <button type="button" name="button" onclick="register_assessor()">สมัครสมาชิก</button> -->
    <a type="button" href="register_assessor.php">สมัครสมาชิก</a>
    <input type="submit"  value="เข้าสู่ระบบ" onclick="check_login()"/>
    <label for="c" class="show-password">
      <input type="checkbox" id="c"/>
      <i class="toggle"></i>
    </label>
  </div>
<?php
  }
?>
