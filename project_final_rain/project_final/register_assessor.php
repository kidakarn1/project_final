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
    <center>
    <br>
    <br>
    <table border="1" bgcolor="#FFFFFF">
      <tr>
        <th>เลขบัตรประชาชน</th>
        <td><input type="text" name="id_card_number"  maxlength="13" required></td>
      </tr>
      <tr>
        <th>ชื่อผู้ใช้</th>
        <td><input type="text" name="per_username" required></td>
      </tr>
      <tr>
        <th>รหัสผ่าน</th>
        <td><input type="password" name="per_password"required></td>
      </tr>
      <tr>
        <th>คำนำหน้าชื่อ</th>
        <td>
          <select id="title_id" name="title_id">
            <?php while ($row_get_title_name = $res_get_title_name->fetch_assoc()) { ?>
                <option value="<?php echo $row_get_title_name['title_id'];?>"><?php echo $row_get_title_name['title_name'];?>
            <?php } ?>
          </select>
       </td>
      </tr>
     <tr>
        <th>ชื่อ</th>
        <td><input type="text" name="per_fname" required></td>
      </tr>
      <tr>
        <th>นามสกุล</th>
        <td><input type="text" name="per_lname"required></td>
      </tr>
      <tr>
        <th>อีเมลล์</th>
        <td><input type="email" name="per_email" required></td>
      </tr>
      <tr>
        <th>เบอร์โทรศัพท์</th>
        <td><input type="number" name="per_phone" min="0"  required></td>
      </tr>
      <tr>
        <th>หน่วยงาน</th>
        <td><input type="text" name="per_department" required></td>
      </tr>
      <tr>
        <td colspan="2">
          <button type="button" name="button" onclick="register_assessor()">ยืนยัน</button>
          <button type="button" name="button" onclick="reset_assessor()">ยกเลิก</button>
        </td>
      </tr>
    </table>
  </center>
  </body>
</html>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="js/javascript_stream_th.js"></script>
