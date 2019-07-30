<?php
include("../../connect/conn.php");
$eva_id = $_REQUEST['eva_id'];
$eva_name = $_REQUEST['eva_name'];
$eva_description = $_REQUEST['eva_description'];
$eva_note = $_REQUEST['eva_note'];
$ass_cat_id = $_REQUEST['ass_cat_id'];

$sql = "update evaluation set
eva_name = '$eva_name' ,
eva_description = '$eva_description' ,
eva_note = '$eva_note' ,
ass_cat_id = '$ass_cat_id' where
eva_id = '$eva_id'";

$res = $conn->query($sql);
header("location: show.php");
?>
