<?php
include("../../connect/conn.php");
$ass_cat_id = $_REQUEST['ass_cat_id'];
$ass_cat_name = $_REQUEST['ass_cat_name'];

$sql = "update assessment_category set
ass_cat_name = '$ass_cat_name' where
ass_cat_id = '$ass_cat_id'";

$res = $conn->query($sql);
header("location: show.php");
?>
