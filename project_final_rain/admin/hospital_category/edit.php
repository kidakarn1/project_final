<?php
include("../../connect/conn.php");
$host_cat_id = $_REQUEST['host_cat_id'];
$host_cat_name = $_REQUEST['host_cat_name'];

$sql = "update hospital_category set
host_cat_name = '$host_cat_name' where
host_cat_id = '$host_cat_id'";

$res = $conn->query($sql);
header("location: show.php");
?>
