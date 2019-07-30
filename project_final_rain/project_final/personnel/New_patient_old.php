<?php
session_start();
  if (!isset($_SESSION['id_card_number'])){
    echo "<script> window.location.href='../menu_personnel.php'</script>";
  }
  else {
    if (!isset($_GET['hn'])){
        echo "<script> window.location.href='index.php'</script>";
    }
    $hn = $_GET['hn'];
    $hos_id = $_GET['hos_id'];
    include('../connect/conn.php');
    $sql_get_data = "select patient.*,
      title_name.title_name,
      relationship_status.rel_name,
      hospital.hos_id,
      hospital.hos_name ,
      hospital_category.host_cat_name
      from  patient,title_name,relationship_status,hospital,hospital_category
      where patient.hn = '$hn' and patient.hos_id = '$hos_id'and patient.title_id = title_name.title_id and patient.rel_id = relationship_status.rel_id and
      patient.hos_id = hospital.hos_id and  hospital.host_cat_id = hospital_category.host_cat_id";
    $res_get_data = $conn->query($sql_get_data);
    $row_get_data = $res_get_data->fetch_assoc();
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
          <th>สถาบัน: <?php echo $row_get_data['host_cat_name']; ?>
          </th>
          <input type="hidden" id="hos_id" name="hos_id" value="<?php echo $row_get_data['hos_id']; ?>">
          <th colspan="3">สถาบันภายใน: <?php echo $row_get_data['hos_name']; ?>
            <!-- ห้ามลบ class="show_hospital" -->
         </th>
       </tr>
        <tr>
          <th colspan="2">
            หมายเลข HN  :
          <input type="hidden" name="hn" id="hn" value="<?php echo $hn; ?>">
          <?php echo $hn; ?>
          </th>
          <th colspan="1">
            หมายเลข บัตรประชาชน :<?php echo   $row_get_data['id_card_number'];?>
          </th>
        </tr>
        <tr>
          <th>คำนำหน้าชื่อ :<?php echo  $row_get_data['title_name']; ?>
         </th>
         <th>
           ชื่อ: <?php echo  $row_get_data['pat_fname']; ?>
         </th>
         <th>นามสกุุล:<?php echo  $row_get_data['pat_lname']; ?></th>
        </tr>
        <tr>
          <th>อายุ:*<input type="number"  id="age" name="age" min="1" value="<?php echo  $row_get_data['age'];?>"> ปี</th>
          <th>น้ำหนัก:*<input type="number"id="weight" name="weight" min="1"  value="<?php echo  $row_get_data['weight'];?>">ก.ก</th>
          <th>ส่วนสูง:*<input type="number" id="height" name="height" min="1" value="<?php echo  $row_get_data['height'];?>"> ซ.ม</th>
        </tr>
        <tr>
          <th>อาชีพ หรือกิจกรรมที่ทำเป็นประจำ:*<input type="text" id="career" name="career" min="1" value="<?php echo  $row_get_data['career'];?>"></th>
          <th colspan="2">
            สถานะภาพ:*<select id="rel_id" name="rel_id">
              <?php while ($row_get_relationship_status = $res_get_relationship_status->fetch_assoc()) { ?>
                  <option value="<?php echo $row_get_relationship_status['rel_id'];?>" <?php if ($row_get_relationship_status['rel_id']==$row_get_data['rel_id']){echo "selected";} ?>>
                    <?php echo $row_get_relationship_status['rel_name'];?>
                  </option>
              <?php } ?>
            </select>
          </th>
        </tr>
        <tr>
          <th>วันที่ป่วยเป็นโรคหลอดเลือดสมอง:*<input type="date" id="stroke_days"  name="stroke_days" value="<?php echo  $row_get_data['stroke_days'];?>"></th>
          <th>การวินิจฉัยของแพทย์:*<textarea name="doctor_diagnosis" id="doctor_diagnosis" value="<?php echo  $row_get_data['doctor_diagnosis'];?>"><?php echo  $row_get_data['doctor_diagnosis'];?></textarea></th>
          <th>การวินิจฉัยทางกายภาพบำบัด:*<textarea name="physical_therapy_diagnosis" id="physical_therapy_diagnosis"  value="<?php echo  $row_get_data['physical_therapy_diagnosis'];?>"><?php echo $row_get_data['physical_therapy_diagnosis'];?></textarea></th>
        </tr>
        <tr>
          <th colspan="3">อาการสำคัญผู้ป่วย:*
            <textarea name="important_symptoms_patients" id="important_symptoms_patients" value="<?php echo  $row_get_data['important_symptoms_patients'];?>"><?php echo  $row_get_data['important_symptoms_patients'];?></textarea></th>
        </tr>
        <tr>
          <th colspan="3">ประวัติการรักษาทางกายภาพบำบัด(ถ้ามี):<textarea name="history_of_physical_therapy_treatment" id="history_of_physical_therapy_treatment" value="<?php echo  $row_get_data['history_of_physical_therapy_treatment'];?>"><?php echo  $row_get_data['history_of_physical_therapy_treatment'];?></textarea></th>
        </tr>
        <tr>
          <th colspan="3">ข้อห้าม ข้อควรระวัง (ถ้ามี):<textarea id="warning" name="warning" value="<?php echo $row_get_data['warning'];?>"><?php echo $row_get_data['warning'];?></textarea></th>
        </tr>
        <tr>
          <th colspan="3">โรคประจำตัว:<textarea id="congenital_disease" name="congenital_disease" value="<?php echo $row_get_data['congenital_disease'];?>"><?php echo $row_get_data['congenital_disease'];?></textarea></th>
        </tr>
        <tr>
          <th colspan="3">ประวัติการแพ้ยา:<textarea id="drug_allergy_history" name="drug_allergy_history" value="<?php echo $row_get_data['drug_allergy_history'];?>"><?php echo $row_get_data['drug_allergy_history'];?></textarea></th>
        </tr>
        <tr>
          <th>คะแนน STREAM:.........</th>
        </tr>
        <tr>
          <th>คะแนน STREAM:.........</th>
        </tr>
      </table>
      <br>
      <button type="button" class="btn btn-primary" onclick="menu_evaluation_old()">เริ่มประเมิน STREAM - Th</button>
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
