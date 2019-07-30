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

$sql = "update patient set
title_id = '$title_id' ,
pat_fname = '$pat_fname' ,
pat_lname = '$pat_lname' ,
age = '$age' ,
weight = '$weight' ,
height = '$height' ,
career = '$career' ,
rel_id = '$rel_id' ,
stroke_days = '$stroke_days' ,
doctor_diagnosis = '$doctor_diagnosis' ,
physical_therapy_diagnosis = '$physical_therapy_diagnosis' ,
important_symptoms_patients = '$important_symptoms_patients' ,
history_of_physical_therapy_treatment = '$history_of_physical_therapy_treatment' ,
warning = '$warning' ,
congenital_disease = '$congenital_disease' ,
drug_allergy_history = '$drug_allergy_history' ,
hos_id = '$hos_id' ,
id_card_number = '$id_card_number' where
hn = '$hn'";

$res = $conn->query($sql);
header("location: show.php");
?>
