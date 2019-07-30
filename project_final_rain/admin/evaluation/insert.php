<?php
include("../../connect/conn.php");
$eva_name = $_REQUEST['eva_name'];
$eva_description = $_REQUEST['eva_description'];
$eva_note = $_REQUEST['eva_note'];
$ass_cat_id = $_REQUEST['ass_cat_id'];

$sql = "insert into evaluation (eva_name,eva_description,eva_note,ass_cat_id) values ('$eva_name','$eva_description','$eva_note','$ass_cat_id')";

$res = $conn->query($sql);
header("location: show.php");
?>
