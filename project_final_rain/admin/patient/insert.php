<?php
include("../../connect/conn.php");
$hn = $_REQUEST['hn'];
$title_id = $_REQUEST['title_id'];
$pat_fname = $_REQUEST['pat_fname'];
$pat_lname = $_REQUEST['pat_lname'];
$age = $_REQUEST['age'];
$weight = $_REQUEST['weight'];
$height = $_REQUEST['height'];
$career = $_REQUEST['career'];
$rel_id = $_REQUEST['rel_id'];
$stroke_days = $_REQUEST['stroke_days'];
$doctor_diagnosis = $_REQUEST['doctor_diagnosis'];
$physical_therapy_diagnosis = $_REQUEST['physical_therapy_diagnosis'];
$important_symptoms_patients = $_REQUEST['important_symptoms_patients'];
$history_of_physical_therapy_treatment = $_REQUEST['history_of_physical_therapy_treatment'];
$warning = $_REQUEST['warning'];
$congenital_disease = $_REQUEST['congenital_disease'];
$drug_allergy_history = $_REQUEST['drug_allergy_history'];
$hos_id = $_REQUEST['hos_id'];
// $host_cat_id = $_REQUEST['host_cat_id'];
$id_card_number = $_REQUEST['id_card_number'];
$sql = "insert into patient values
(
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
)";

$res = $conn->query($sql);
header("location: show.php");
?>
