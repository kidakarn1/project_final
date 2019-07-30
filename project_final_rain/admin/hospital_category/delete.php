<?php
include("../../connect/conn.php");
$host_cat_id = $_REQUEST['host_cat_id'];
$sql = "delete from hospital_category where host_cat_id = '$host_cat_id'";
$res = $conn->query($sql);
header("location: show.php")
?>
