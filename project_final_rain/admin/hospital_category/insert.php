<?php
include("../../connect/conn.php");
$host_cat_name = $_REQUEST['host_cat_name'];
$sql = "insert into hospital_category (host_cat_name) VALUES ('$host_cat_name')";
$res = $conn->query($sql);
header("location: show.php");
?>
