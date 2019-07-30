<?php
include("../../connect/conn.php");
$ass_cat_id = $_REQUEST['ass_cat_id'];
$ass_cat_name = $_REQUEST['ass_cat_name'];

$sql = "insert into assessment_category values  ('$ass_cat_id','$ass_cat_name')";

$res = $conn->query($sql);
header("location: show.php");
?>
