<?php
include("../../connect/conn.php");
$rel_id = $_REQUEST['rel_id'];
$sql = "delete from relationship_status where rel_id = '$rel_id'";
$res = $conn->query($sql);
header("location: show.php");
?>
