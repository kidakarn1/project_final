<?php
include("../../connect/conn.php");
$ass_score_id = $_REQUEST['ass_score_id'];
$sql = "delete from assessment_score where ass_score_id = '$ass_score_id'";
$res = $conn->query($sql);
header("location: show.php")
?>
