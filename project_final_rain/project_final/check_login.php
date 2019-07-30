<?php
  include('connect/conn.php');
  session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];
  $passwoed_md5 = md5($password);
  $sql_personnel_category = 'select * from personnel_category';
  $res_personnel_category = $conn->query($sql_personnel_category);
  $sql ="select * from personnel,title_name where personnel.per_username  = '$username' and personnel.per_password = '$passwoed_md5' and personnel.title_id = title_name.title_id";
  $res_query=$conn->query($sql);
  $row_query=$res_query->fetch_assoc();
  if ($row_query){
    while ($row_personnel_category=$res_personnel_category->fetch_assoc()) {
      if ($row_personnel_category['cat_id']==$row_query['cat_id']){
        $_SESSION['id_card_number'] = $row_query['id_card_number'];
        $_SESSION['per_username'] = $row_query['per_username'];
        $_SESSION['per_password'] = $row_query['per_password'];
        $_SESSION['title_name'] = $row_query['title_name'];
        $_SESSION['per_fname'] = $row_query['per_fname'];
        $_SESSION['per_lname'] = $row_query['per_lname'];
        $_SESSION['per_email'] = $row_query['per_email'];
        $_SESSION['per_phone'] = $row_query['per_phone'];
        $_SESSION['per_department'] = $row_query['per_department'];
        $_SESSION['full_name'] = $_SESSION['title_name'].' '.$_SESSION['per_fname'].' '.$_SESSION['per_lname'];
        $_SESSION['cat_id'] = $row_query['cat_id'];
        $data['text'] = $row_personnel_category['cat_id'];
      }
      else {
        $data['text']='NO_CAT_ID';
      }
    }
  }
  else {
    $data['text']=0;
  }
  echo json_encode($data['text']);
 ?>
