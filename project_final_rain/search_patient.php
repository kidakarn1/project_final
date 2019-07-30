<?php
  include('menu.php');
  if (!isset($_SESSION['id_card_number'])){
    echo "<script> window.location.href='index.php'</script>";
  }
  else {
    $condition = 0;
    if (isset($_POST['key_para']) && $_POST['key_para']!=''){
      $key_para=$_POST['key_para'];
      include('connect/conn.php');
      $sql="select  * from patient where (hn like '%$key_para%') or (pat_fname like '%$key_para%' ) or (pat_lname like '%$key_para%')";
      $res=$conn->query($sql);
      $condition = 1;
      ?>
    <?php
    }
  ?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <body>
      <h3>ค้นหาผู้ป่วยเก่า</h3>
      <center>
        <form method="post">
          <table border="0">
            <tr>
              <th><h1>HN / กรอกชื่อ-สกุล <input type="text" name="key_para" id="key_para">
              <input type="submit" class="btn btn-success" name="button" value="ค้นหา"></h1><br><br></th>
            </tr>
          </table>
            <?php
              if ($condition==1){
              ?>
                <table border="1">
                  <tr>
                    <th>ลำดับ</th>
                    <th>HN</th>
                    <th>ชื่อ-สกุล</th>
                    <th>วันประเมิน</th>
                    <th>รายละเอียด</th>
                  </tr>
              <?php
                $i=1;
                while($row=$res->fetch_assoc()){
              ?>
              <tr>
                <input type="hidden" id="hos_id" value="<?php echo $row['hos_id'];?>">
                <input type="hidden" id="hn" value="<?php echo $row['hn'];?>">
                <td><?php echo $i; ?></td>
                <td><?php echo $row['hn'];?></td>
                <td><?php echo $row['pat_fname'].' '.$row['pat_lname'];?></td>
                <td>nullนะจ๊ะ</td>
                <td><button type="button" class="btn btn-warning" name="button" onclick="search_patient_old('<?php echo $row['hn'];?>','<?php echo $row['hos_id'];?>')">รายละเอียด</button></td>
              </tr>
            <?php
              $i++;
              }
            ?>
            <?php
              }
            ?>
          </table>
        </form>
      </center>
    </body>
  </html>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/sweetalert.min.js"></script>
  <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
  <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
  <script src="js/javascript_stream_th.js"></script>
  <?php
  }
 ?>
