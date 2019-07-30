<?php
include("../../connect/conn.php");
$id_card_number = $_REQUEST['id_card_number'];
$per_username = $_REQUEST['per_username'];
$per_password = $_REQUEST['per_password'];
$title_id = $_REQUEST['title_id'];
$per_fname = $_REQUEST['per_fname'];
$per_lname = $_REQUEST['per_lname'];
$per_email = $_REQUEST['per_email'];
$per_phone = $_REQUEST['per_phone'];
$per_department = $_REQUEST['per_department'];
$cat_id = $_REQUEST['cat_id'];
$sql = "insert into personnel values
(
  '$id_card_number',
  '$per_username',
  '$per_password',
  '$title_id',
  '$per_fname',
  '$per_lname',
  '$per_email',
  '$per_phone',
  '$per_department',
  '$cat_id'
)";
$res = $conn->query($sql);
header("location: show.php");
?>
