<?php
include("../../connect/conn.php");
$cat_id = $_REQUEST['cat_id'];
$cat_name_eng = $_REQUEST['cat_name_eng'];
$cat_name_th = $_REQUEST['cat_name_th'];
$sql = "update personnel_category set
cat_name_eng = '$cat_name_eng' ,
cat_name_th = '$cat_name_th' where
cat_id = '$cat_id'";
$res = $conn->query($sql);
header("location: show.php");
?>
