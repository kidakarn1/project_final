<?php
session_start();
  if (!isset($_SESSION['id_card_number'])){
    echo "<script> window.location.href='../menu_personnel.php'</script>";
  }
  else {
    include('../connect/conn.php');
    $sql="select * from assessment_category";
    $res = $conn->query($sql);
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
    <h1><?php echo $_SESSION['full_name']; ?></h1>
    <center>
      <?php
        while ($row = $res->fetch_assoc()) {
          ?>
          <button type="button" class="btn btn-success"  onclick="next_Arm_assessment('<?php echo $row['ass_cat_id']; ?>')"><h1><?php echo $row['ass_cat_name']; ?></h1></button><br><br>
        <?php
        }
        ?>
      <!-- <button type="button" class="btn btn-danger " name="button"><h1>ประเมิน ขา</h1></button><br><br>
      <button type="button" class="btn btn-primary" name="button"><h1>ประเมิน การเคลื่อนไหวพื้นฐาน</h1></button>
    </center> -->
  </body>
</html>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/sweetalert.min.js"></script>
<script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="../js/javascript_stream_th.js"></script>
<?php
  }
?>
