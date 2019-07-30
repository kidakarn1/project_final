<?php
include("../../connect/conn.php");
$hn = $_REQUEST['hn'];
$sql = "delete from patient where hn = '$hn'";
$res = $conn->query($sql);
header("location: show.php")
?>
