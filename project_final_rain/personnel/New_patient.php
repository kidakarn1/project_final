<?php
$a = 'path';
include('../menu.php');
?>
<?php
if (!isset($_SESSION['id_card_number'])){
echo "<script> window.location.href='../menu.php'</script>";
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

$sql_main_ass = "select max(`Assessment_time`) as Assessment_time from main_assessment";
$res_main_ass =   $res_main_ass = $conn->query($sql_main_ass);
$row_main_ass = $res_main_ass->fetch_assoc();
$_SESSION['Assessment_time'] = ($row_main_ass['Assessment_time']+1);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reveal Bootstrap Template</title>
  </head>
  <body>
    <div class="container">
      <div class="form-horizontal">
        <div class="form-group row">
          <label class="col-sm-12 col-form-label">โปรดกรอกข้อมูลของผู้ป่วย</label>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label text-right">หมายเลข บัตรประชาชน :</label>
          <div class="col-sm-2">
            <input class="form-control" type="text" name="id_card_number" id="id_card_number" maxlength="13" min="0">
            <p id="show_check_pat"></p>
          </div>
          <label class=" col-sm-2 control-label">สถาบัน :</label>
          <div class="col-sm-3">
            <select class="form-control" id="host_cat_id" name="host_cat_id" onchange="get_hospital()">
              <?php while ($row_get_hospital_category = $res_get__hospital_category->fetch_assoc()) { ?>
              <option id='host_cat_id<?php echo $row_get_hospital_category['host_cat_id'];?>' value="<?php echo $row_get_hospital_category['host_cat_id'];?>"><?php echo $row_get_hospital_category['host_cat_name'];?></option>
              <?php } ?>
            </select>
          </div>
          <label class="col-sm-2 col-form-label">สถาบันภายใน :</label>
          <div class="col-sm-3">
            <div class="show_hospital"></div>
            <!-- ห้ามลบ class="show_hospital" -->
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">หมายเลข HN :</label>
          <div class="col-sm-2">
            <input class="form-control" type="text" name="hn" id="hn" maxlength="10" min="0">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-1 col-form-label text-right">คำนำหน้าชื่อ :</label>
          <div class="col-sm-1">
            <select id="title_id" name="title_id">
              <?php while ($row_get_title_name = $res_get_title_name->fetch_assoc()) { ?>
              <option id='title_id_pat<?php echo $row_get_title_name['title_id'];?>'value="<?php echo $row_get_title_name['title_id'];?>"><?php echo $row_get_title_name['title_name'];?>
              <?php } ?>
            </select>
          </div>
          <label class="col-sm-1 col-form-label text-right">ชื่อ :</label>
          <div class="col-sm-1">
            <input class="form-control" type="text" id="pat_fname" name="pat_fname">
          </div>
          <label class="col-sm-1 col-form-label text-right">นามสกุุล:*</label>
          <div class="col-sm-1">
            <input class="form-control" type="text" id="pat_lname" name="pat_lname">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label text-right">วันเกิด:*</label>
          <div class="col-sm-8">
            <input class="form-control" type="date"  id="age" name="age" min="1">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label text-right">อายุ:*</label>
          <div id="age_pagunub" class="col-sm-8">
            <!-- ห้าามลบ -->
          </div>
          <label class="col-sm-2 col-form-label text-left">ปี</label>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label text-right">น้ำหนัก:*</label>
          <div class="col-sm-8">
            <input class="form-control" type="number"id="weight" name="weight" min="1">
          </div>
          <label class="col-sm-2 col-form-label text-left">ก.ก</label>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label text-right">ส่วนสูง:*</label>
          <div class="col-sm-8">
            <input class="form-control" type="number" id="height" name="height" min="1">
          </div>
          <label class="col-sm-2 col-form-label text-left">ซ.ม</label>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label text-right">อาชีพ หรือกิจกรรมที่ทำเป็นประจำ:*</label>
          <div class="col-sm-8">
            <input class="form-control" type="text" id="career" name="career" min="1">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label text-right">สถานะภาพ:*</label>
          <div class="col-sm-8">
            <select class="form-control" id="rel_id" name="rel_id">
              <?php while ($row_get_relationship_status = $res_get_relationship_status->fetch_assoc()) { ?>
              <option id='rel_id<?php echo $row_get_relationship_status['rel_id'];?>'value="<?php echo $row_get_relationship_status['rel_id'];?>"><?php echo $row_get_relationship_status['rel_name'];?>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label text-right">วันที่ป่วยเป็นโรคหลอดเลือดสมอง:*</label>
          <div class="col-sm-8">
            <input class="form-control" type="date" id="stroke_days"  name="stroke_days">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label text-right">การวินิจฉัยของแพทย์:*</label>
          <div class="col-sm-8">
            <textarea class="form-control" name="doctor_diagnosis" id="doctor_diagnosis"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label text-right">การวินิจฉัยทางกายภาพบำบัด:*</label>
          <div class="col-sm-8">
            <textarea class="form-control" name="physical_therapy_diagnosis" id="physical_therapy_diagnosis"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label text-right">อาการสำคัญผู้ป่วย:*</label>
          <div class="col-sm-8">
            <textarea class="form-control" name="important_symptoms_patients" id="important_symptoms_patients" ></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label text-right">ประวัติการรักษาทางกายภาพบำบัด(ถ้ามี):</label>
          <div class="col-sm-8">
            <textarea class="form-control" name="history_of_physical_therapy_treatment" id="history_of_physical_therapy_treatment"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label text-right">ข้อห้าม ข้อควรระวัง (ถ้ามี):</label>
          <div class="col-sm-8">
            <textarea class="form-control" id="warning" name="warning"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label text-right">โรคประจำตัว:</label>
          <div class="col-sm-8">
            <!-- <input class="form-control" type="text" id="congenital_disease" name="congenital_disease"> -->
            <textarea class="form-control" id="congenital_disease" name="congenital_disease"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label text-right">ประวัติการแพ้ยา:</label>
          <div class="col-sm-8">
            <textarea class="form-control" id="drug_allergy_history" name="drug_allergy_history"></textarea>
          </div>
        </div>
        <div class=""  id="show_main_assessment">

        </div>
        <button type="button" class="btn btn-primary" onclick="menu_evaluation()">เริ่มประเมิน STREAM - Th</button>
      </div>
    </div>
  </body>
</html>
<?php } ?>
