<?php
    include('../connect/conn.php');
    $sql_get_patient = "select patient.* ,
    hospital.hos_id ,
    hospital.host_cat_id,
    hospital_category.host_cat_id
    from  patient,hospital,hospital_category where
    patient.hos_id = hospital.hos_id and
    hospital.host_cat_id = hospital_category.host_cat_id and
    hospital.hos_status = '1'";
    $res_get_patient = $conn->query($sql_get_patient);
    $i=1;
    while ($row_patient=$res_get_patient->fetch_assoc()) {
      // $data['data'][$i] = $row['hos_id'].','.$row['hos_name'];
       $json[] = $row_patient;
      $i++;
    }
    $data['data'] = $json;
    // print_r($data['data']);
    echo json_encode($data);
 ?>
