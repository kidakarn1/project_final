<?php
include("../../connect/conn.php");
$ass_cat_id = $_REQUEST['ass_cat_id'];
$sql = "delete from assessment_category where ass_cat_id = '$ass_cat_id'";
$res = $conn->query($sql);
header("location: show.php")
?>
