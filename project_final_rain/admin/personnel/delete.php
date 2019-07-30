<?php
include("../../connect/conn.php");
$id_card_number = $_REQUEST['id_card_number'];
$sql = "delete from personnel where id_card_number = '$id_card_number'";
$res = $conn->query($sql);
header("location: show.php")
?>
