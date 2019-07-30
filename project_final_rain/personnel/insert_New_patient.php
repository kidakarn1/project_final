<?php
  if (!isset($_POST['hn'])){
    $data['status']=0;//ไม่มีสิทธิ์เข้าถึง เพราะไม่ได้ส่งหมายเลข hn มา
  }
  else {
    session_start();
    include('../connect/conn.php');
    $host_cat_id=$_POST['host_cat_id'];
    $hos_id=$_POST['hos_id'];
    $hn=$_POST['hn'];
    $id_card_number=$_POST['id_card_number'];
    $hos_id=$_POST['hos_id'];
    $title_id=$_POST['title_id'];
    $pat_fname=$_POST['pat_fname'];
    $pat_lname=$_POST['pat_lname'];
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
    $sql_check_hn = "select id_card_number from patient";
    $res_check_hn = $conn->query($sql_check_hn);
    $condition = 0;//insert data
    $_SESSION['pat_id_card_number'] = $id_card_number; //hn ที่เลือกไว้
    $_SESSION['check_hos_id'] = $hos_id; //hos_id ที่เลือกไว้
    while ($row_check_per_id=$res_check_hn->fetch_assoc()) {
      if ($row_check_per_id['id_card_number']==$id_card_number){
        //$data['status']=0;//คือมีข้อมูล หมายเลขนี้อยู่ใน table แล้ว
        // $condition = 1;
        $condition = 2;// update data
      }
    }
    if ($condition==0){
      $sql_query_patient = "
        insert into patient(hn, title_id, pat_fname, pat_lname, birthday, weight, height, career, rel_id, stroke_days,doctor_diagnosis, physical_therapy_diagnosis, important_symptoms_patients, history_of_physical_therapy_treatment,warning, congenital_disease, drug_allergy_history,hos_id,id_card_number)
        VALUES (
        '$hn',
        '$title_id',
        '$pat_fname',
        '$pat_lname',
        '$age',
        '$weight',
        '$height',
        '$career',
        '$rel_id',
        '$stroke_days',
        '$doctor_diagnosis',
        '$physical_therapy_diagnosis',
        '$important_symptoms_patients',
        '$history_of_physical_therapy_treatment',
        '$warning',
        '$congenital_disease',
        '$drug_allergy_history',
        '$hos_id',
        '$id_card_number'
        )
      ";
      $res_query_patient = $conn->query($sql_query_patient);
      if ($res_query_patient){
        $data['status']=200;
      }
      else {
        $data['status']=400;
      }
    }
    else if ($condition==2){
      $sql_query_patient = "
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
      $res_query_patient = $conn->query($sql_query_patient);
      if ($res_query_patient){
        $data['status']=200;
      }
      else {
        $data['status']=400;
      }
    }
    echo json_encode($data['status']);
  }
 ?>
