<?php
include("../../connect/conn.php");
$title_id = $_REQUEST['title_id'];
$title_name = $_REQUEST['title_name'];
$sql = "update title_name set
title_name = '$title_name' where
title_id = '$title_id'";
$res = $conn->query($sql);
header("location: show.php");
?>
