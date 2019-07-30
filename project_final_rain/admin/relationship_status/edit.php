<?php
include("../../connect/conn.php");
$rel_id = $_REQUEST['rel_id'];
$rel_name = $_REQUEST['rel_name'];
$sql = "update relationship_status set
rel_name = '$rel_name' where
rel_id = '$rel_id'";
$res = $conn->query($sql);
header("location: show.php");
?>
