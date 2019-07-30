<?php
  if(!isset($_POST['host_cat_id'])){
    $data['data']=0;
  }
  else {
    include('../connect/conn.php');
    $host_cat_id= $_POST['host_cat_id'];
    $sql_get_hospital = "select * from  hospital where  host_cat_id = '$host_cat_id'";
    $res_get_hospital = $conn->query($sql_get_hospital);
    $i=1;
    while ($row=$res_get_hospital->fetch_assoc()) {
      // $data['data'][$i] = $row['hos_id'].','.$row['hos_name'];
       $json[] = $row;
      $i++;
    }
    $data['data'] = $json;
    // print_r($data['data']);
    echo json_encode($data);
  }
 ?>
