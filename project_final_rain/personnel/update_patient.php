<?php
  if (!isset($_POST['hn'])){
    $data['status']=0;//ไม่มีสิทธิ์เข้าถึง เพราะไม่ได้ส่งหมายเลข hn มา
  }
  else {
    include('../connect/conn.php');
    $hn=$_POST['hn'];
    $hos_id=$_POST['hos_id'];
    $age=$_POST['age'];
    $weight=$_POST['weight'];
    $height=$_POST['height'];
    $career=$_POST['career'];
    $rel_id=$_POST['rel_id'];
    $stroke_days=$_POST['stroke_days'];
    $doctor_diagnosis=$_POST['doctor_diagnosis'];
    $physical_therapy_diagnosis=$_POST['physical_therapy_diagnosis'];
    $important_symptoms_patients=$_POST['important_symptoms_patients'];
    $history_of_physical_therapy_treatment=$_POST['history_of_physical_therapy_treatment'];
    $warning=$_POST['warning'];
    $congenital_disease=$_POST['congenital_disease'];
    $drug_allergy_history=$_POST['drug_allergy_history'];
    $sql_check_hn = "select hn,hos_id from patient";
    $res_check_hn = $conn->query($sql_check_hn);
    $condition = 0;
    if ($condition==0){
      $sql_update_patient = "
        update patient set
         birthday ='$age',
         weight = '$weight',
         height = '$height',
         career = '$career',
         rel_id = '$rel_id',
         stroke_days = '$stroke_days',
         doctor_diagnosis  = '$doctor_diagnosis',
         physical_therapy_diagnosis = '$physical_therapy_diagnosis',
         important_symptoms_patients = '$important_symptoms_patients',
         history_of_physical_therapy_treatment = '$history_of_physical_therapy_treatment',
         warning = '$warning',
         congenital_disease = '$congenital_disease',
         drug_allergy_history = '$drug_allergy_history'
         where hn='$hn' and hos_id = '$hos_id'
      ";
      $res_update_patient = $conn->query($sql_update_patient);
      if ($res_update_patient){
        $data['status']=200;
      }
      else {
        $data['status']=400;
      }
    }
    echo json_encode($data['status']);
  }
 ?>
