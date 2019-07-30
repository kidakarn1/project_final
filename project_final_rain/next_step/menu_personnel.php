<?php
session_start();
  // if (!isset($_SESSION['id_card_number'])){
  //   echo "<script> window.location.href='menu_personnel.php'</script>";
  // }
  // else {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
  <body>
    <h1><?php echo $_SESSION['full_name']; ?>  <a href="../logout.php">ออกจากระบบ</a></h1>
    <center>
      <button type="button" class="btn btn-primary" name="button"  id="menu1()" onclick="next_New_patient()"><h1>ผู้ป่วยใหม่</h1></button><br><br>
      <button type="button" class="btn btn-warning" name="button"  onclick="next_search_patient()"><h1>ผู้ป่วยเก่า</h1></button><br><br>
      <a href='TH_STREAM_Manual.pdf'><button type="button" class="btn btn-info" name="button"><h1>คู่มือแบบประเมิน STREAM- Th</h1></button></a>
    </center>
  </body>
</html>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/sweetalert.min.js"></script>
<script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="../js/javascript_stream_th.js"></script>
<?php
  // }
?>
