<?php
include("../../connect/conn.php");
$id_card_number = $_REQUEST['id_card_number'];
$title_id = $_REQUEST['title_id'];
$per_fname = $_REQUEST['per_fname'];
$per_lname = $_REQUEST['per_lname'];
$per_email = $_REQUEST['per_email'];
$per_phone = $_REQUEST['per_phone'];
$per_department = $_REQUEST['per_department'];
$cat_id = $_REQUEST['cat_id'];
$sql = "update personnel set
per_fname = '$per_fname' ,
title_id = '$title_id' ,
per_lname = '$per_lname' ,
per_email = '$per_email' ,
per_phone = '$per_phone' ,
per_department = '$per_department' ,
cat_id = '$cat_id' where
id_card_number = '$id_card_number'";
$res = $conn->query($sql);
header("location: show.php");
?>
