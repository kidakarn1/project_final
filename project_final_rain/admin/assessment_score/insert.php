<?php
include("../../connect/conn.php");
$ass_score_id = $_REQUEST['ass_score_id'];
$ass_score_description = $_REQUEST['ass_score_description'];
$ass_score = $_REQUEST['ass_score'];


$sql = "insert into assessment_score values ('$ass_score_id','$ass_score_description','$ass_score')";

$res = $conn->query($sql);
header("location: show.php");
?>
