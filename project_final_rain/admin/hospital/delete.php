<?php
include("../../connect/conn.php");
$hos_id = $_REQUEST['hos_id'];
$sql = "delete from hospital where hos_id = '$hos_id'";
$res = $conn->query($sql);
header("location: show.php")
?>
