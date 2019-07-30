<?php
include("../../connect/conn.php");
$cat_id = $_REQUEST['cat_id'];
$cat_name_eng = $_REQUEST['cat_name_eng'];
$cat_name_th = $_REQUEST['cat_name_th'];
$sql = "insert into personnel_category VALUES ('$cat_id','$cat_name_eng','$cat_name_th')";
$res = $conn->query($sql);
header("location: show.php");
?>
