<?php
  include('../connect/conn.php');
  $id_card_number=$_POST['id_card_number'];
  $per_username=$_POST['per_username'];
  $per_password=$_POST['per_password'];
  $title_id=$_POST['title_id'];
  $per_fname=$_POST['per_fname'];
  $per_lname=$_POST['per_lname'];
  $per_email=$_POST['per_email'];
  $per_phone=$_POST['per_phone'];
  $per_department=$_POST['per_department'];
  $sql_check_per_id = "select id_card_number from personnel";
  $password_md5=md5($per_password);
  $condition = 0;
  $res_check_per_id = $conn->query($sql_check_per_id);
  while ($row_check_per_id=$res_check_per_id->fetch_assoc()) {
    if ($row_check_per_id['id_card_number']==$id_card_number){
      $data['status']=0;//คือมีข้อมูล หมายเลขนี้อยู่ใน table แล้ว
      $condition = 1;
    }
  }
  if ($condition==0){
    // $insert_approve =
    // "
    // insert into approve (id_card_number,status)
    // VALUES(
    //   '$id_card_number',
    //   '0'
    //   )
    // ";
    // $res_insert_approve = $conn->query($insert_approve);
    $insert_personnel =
      "
      insert into personnel (id_card_number , per_username , per_password , title_id , per_fname , per_lname , per_email , per_phone , per_department , cat_id)
      VALUES(
        '$id_card_number',
        '$per_username',
        '$password_md5',
        '$title_id',
        '$per_fname',
        '$per_lname',
        '$per_email',
        '$per_phone',
        '$per_department',
        'PT'
        )
      ";
    $res_insert_personnel = $conn->query($insert_personnel);
    if ($res_insert_personnel){
      $data['status']=200;//สำเร็จ;
    }
    else {
      $data['status']=400;//ปัญหา;
    }
  }
  echo json_encode($data['status']);
?>
