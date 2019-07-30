<?php
include("../../connect/conn.php");
$eva_id = $_REQUEST['eva_id'];
$sql = "delete from evaluation where eva_id = '$eva_id'";
$res = $conn->query($sql);
header("location: show.php")
?>
