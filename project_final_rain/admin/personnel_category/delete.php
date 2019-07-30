<?php
include("../../connect/conn.php");
$cat_id = $_REQUEST['cat_id'];
$sql = "delete from personnel_category where cat_id = '$cat_id'";
$res = $conn->query($sql);
header("location: show.php")
?>
