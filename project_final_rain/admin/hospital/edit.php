<?php
include("../../connect/conn.php");
$hos_id = $_REQUEST['hos_id'];
$hos_name = $_REQUEST['hos_name'];
$hos_status = $_REQUEST['hos_status'];
$host_cat_id = $_REQUEST['host_cat_id'];


$sql = "update hospital set
hos_name = '$hos_name' ,
hos_status = '$hos_status' ,
host_cat_id = '$host_cat_id' where
hos_id = '$hos_id'";

$res = $conn->query($sql);
header("location: show.php");
?>
