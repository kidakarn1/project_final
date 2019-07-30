<?php
  //if (isset($_POST['index_score'])){
    include('../connect/conn.php');
    $value_score = $_POST['value_score'];
    $index_score = $_POST['index_score'];
    $para = $_POST['para'];
    $sql_get_assessment_score = "select * from assessment_score";
    $res_get_assessment_score = $conn->query($sql_get_assessment_score);
    // echo "ppp--->".$para;
    while ($row_get_assessment_score = $res_get_assessment_score->fetch_assoc()) {
      $ass_score_id_query= substr($row_get_assessment_score['ass_score_id'],-10,-8);
      // echo $ass_score_id_query."<br>";
      if ($ass_score_id_query==$para){
        $pk= $row_get_assessment_score['ass_score_id'];
        $sql="select * from assessment_score where ass_score_id = '$pk'";
        $res=$conn->query($sql);
          while ($row = $res->fetch_assoc()) {
            $mode_cat= substr($row['ass_score_id'],-5,-4);
            if ($mode_cat==$value_score){
              $json[]  = $row;
            }
          }
      }
    }
    $data['data'] = $json;
    // print_r($data['data']);
    echo json_encode($data);
  //}
 ?>
