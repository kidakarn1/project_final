<?php
$host="localhost";
$user="root";
$password="12345678";
$db="stream_th";
$conn = new mysqli($host,$user,$password,$db);
$conn->set_charset('utf8');
if (!$conn){
  echo"CONNECT_DATABASE_ERROR";
}
 ?>
