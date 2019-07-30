<?php
session_start();
  if (!isset($_SESSION['id_card_number'])){
    echo "<script> window.location.href='../menu_personnel.php'</script>";
  }
  else {
    include('../connect/conn.php');
    $sql_get_title_name = "select * from title_name";
    $res_get_title_name=$conn->query($sql_get_title_name);
    $sql_get_hospital_category = "select * from  hospital_category";
    $res_get__hospital_category=$conn->query($sql_get_hospital_category);
    $sql_get_relationship_status = "select * from relationship_status";
    $res_get_relationship_status=$conn->query($sql_get_relationship_status);
    $sql_get_hospital = "select * from hospital";
    $res_get_hospital=$conn->query($sql_get_hospital);
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
    <center>
      <table border="1">
        <tr>
          <th colspan="3"><center>โปรดกรอกข้อมูลของผู้ป่วย</center></th>
        </tr>
        <tr>
          <th>สถาบัน
            <select id="host_cat_id" name="host_cat_id" onchange="get_hospital()">
              <?php while ($row_get_hospital_category = $res_get__hospital_category->fetch_assoc()) { ?>
                  <option value="<?php echo $row_get_hospital_category['host_cat_id'];?>"><?php echo $row_get_hospital_category['host_cat_name'];?></option>
              <?php } ?>
            </select>
          </th>
          <th colspan="3">สถาบันภายใน... *:
            <div class="show_hospital"></div>
            <!-- ห้ามลบ class="show_hospital" -->
         </th>
       </tr>
        <tr>
          <th colspan="2">
            หมายเลข HN * :
            <input type="text" name="hn" id="hn" maxlength="10" min="0">
          </th>
          <th colspan="1">
            หมายเลข บัตรประชาชน * :
            <input type="text" name="id_card_number" id="id_card_number" maxlength="13" min="0">
          </th>
        </tr>
        <tr>
          <th>คำนำหน้าชื่อ *:
            <select id="title_id" name="title_id">
              <?php while ($row_get_title_name = $res_get_title_name->fetch_assoc()) { ?>
                  <option value="<?php echo $row_get_title_name['title_id'];?>"><?php echo $row_get_title_name['title_name'];?>
              <?php } ?>
            </select>
         </th>
         <th>
           ชื่อ:* <input type="text" id="pat_fname" name="pat_fname">
         </th>
         <th>นามสกุุล:* <input type="text" id="pat_lname" name="pat_lname"></th>
        </tr>
        <tr>
          <th>วันเกิด:*<input type="date"  id="age" name="age" min="1"></th>
          <th>น้ำหนัก:*<input type="number"id="weight" name="weight" min="1"> ก.ก</th>
          <th>ส่วนสูง:*<input type="number" id="height" name="height" min="1"> ซ.ม</th>
        </tr>
        <tr>
          <th>อาชีพ หรือกิจกรรมที่ทำเป็นประจำ:*<input type="text" id="career" name="career" min="1"></th>
          <th colspan="2">
            สถานะภาพ:*<select id="rel_id" name="rel_id">
              <?php while ($row_get_relationship_status = $res_get_relationship_status->fetch_assoc()) { ?>
                  <option value="<?php echo $row_get_relationship_status['rel_id'];?>"><?php echo $row_get_relationship_status['rel_name'];?>
              <?php } ?>
            </select>
          </th>
        </tr>
        <tr>
          <th>วันที่ป่วยเป็นโรคหลอดเลือดสมอง:*<input type="date" id="stroke_days"  name="stroke_days"></th>
          <th>การวินิจฉัยของแพทย์:*<textarea name="doctor_diagnosis" id="doctor_diagnosis"></textarea></th>
          <th>การวินิจฉัยทางกายภาพบำบัด:*<textarea name="physical_therapy_diagnosis" id="physical_therapy_diagnosis"></textarea></th>
        </tr>
        <tr>
          <th colspan="3">อาการสำคัญผู้ป่วย:*
            <textarea name="important_symptoms_patients" id="important_symptoms_patients" ></textarea></th>
        </tr>
        <tr>
          <th colspan="3">ประวัติการรักษาทางกายภาพบำบัด(ถ้ามี):<textarea name="history_of_physical_therapy_treatment" id="history_of_physical_therapy_treatment"></textarea></th>
        </tr>
        <tr>
          <th colspan="3">ข้อห้าม ข้อควรระวัง (ถ้ามี):<textarea id="warning" name="warning"></textarea></th>
        </tr>
        <tr>
          <th colspan="3">โรคประจำตัว:<textarea id="congenital_disease" name="congenital_disease"></textarea></th>
        </tr>
        <tr>
          <th colspan="3">ประวัติการแพ้ยา:<textarea id="drug_allergy_history" name="drug_allergy_history"></textarea></th>
        </tr>
      </table>
      <br>
      <button type="button" class="btn btn-primary" onclick="menu_evaluation()">เริ่มประเมิน STREAM - Th</button>
    </center>
  </body>
</html>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/sweetalert.min.js"></script>
<script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="../js/javascript_stream_th.js"></script>
<?php } ?>
