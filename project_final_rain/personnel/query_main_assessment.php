<?php
  include('../connect/conn.php');
  $id_card_number_auto = $_POST['id_card_number_auto'];
  $condition = 0;
  $sql_length="select * FROM (select `Assessment_time` ,`assessment_date`, `ass_id` ,`total_score`  from main_assessment where `pat_id_card_number` = '$id_card_number_auto' ORDER BY `total_score` DESC , `Assessment_time` DESC LIMIT 2 )as test  ORDER  by test.Assessment_time DESC";
  $res_length = $conn->query($sql_length);
  $sql_get_main_assessment = "select * from main_assessment where pat_id_card_number = '$id_card_number_auto' order by main_ass_id desc";
  $res_get_main_assessment = $conn->query($sql_get_main_assessment);
  while ($row_get_main_assessment = $res_get_main_assessment->fetch_assoc()){
      $condition = 1;
      $json_mode_score[] = $row_get_main_assessment;
  }
  if ($condition== 1){
    $condition = 1;
    while ($row_length = $res_length->fetch_assoc()){
        $json_lenfth[] = $row_length;
    }
    $data['length_groupby'] = $json_lenfth;
    $data['main_assessment'] = $json_mode_score;
  }
  else {
    $data['length_groupby'] = $json_lenfth[0]='0';
    $data['main_assessment'] = $json_main_assessment[0]='0';
  }
    echo json_encode($data);
 ?>
