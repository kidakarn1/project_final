<?php
$birthday = "1998-07-18 18:24:00";
$age = date_diff(date_create($birthday), date_create('now'))->y;
echo $age;
?>
