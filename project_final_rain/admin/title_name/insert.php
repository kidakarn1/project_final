<?php
include("../../connect/conn.php");
$title_name = $_REQUEST['title_name'];
$sql = "insert into title_name (title_name) VALUES ('$title_name')";
$res = $conn->query($sql);
header("location: show.php");
?>
