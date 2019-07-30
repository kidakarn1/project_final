<?php
include("../../connect/conn.php");
$rel_name = $_REQUEST['rel_name'];
$sql = "insert into relationship_status (rel_name) VALUES ('$rel_name')";
$res = $conn->query($sql);
header("location: show.php");
?>
