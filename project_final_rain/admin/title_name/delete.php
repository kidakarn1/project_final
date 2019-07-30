<?php
include("../../connect/conn.php");
$title_id = $_REQUEST['title_id'];
$sql = "delete from title_name where title_id = '$title_id'";
$res = $conn->query($sql);
header("location: show.php")
?>
