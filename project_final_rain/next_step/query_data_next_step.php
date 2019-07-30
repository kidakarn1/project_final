<?php
  include('../connect/conn.php');
  $ass_cat_id = $_POST['id'];
  $_SESSION['ass_cat_id'] = $ass_cat_id;
  $sql="select * from assessment_category";
  $sql_get_evaluation = "select *  from evaluation where ass_cat_id = '$ass_cat_id' order by ass_cat_id desc";
  $sql_get_evaluation_count = "select count(eva_id) as count_eva from evaluation where ass_cat_id = '$ass_cat_id'";
  $res_get_evaluation = $conn->query($sql_get_evaluation);
  $res_get_evaluation_data = $conn->query($sql_get_evaluation);
  $res_get_evaluation_count = $conn->query($sql_get_evaluation_count);
  $row_get_evaluation_count = $res_get_evaluation_count->fetch_assoc();
  $check= $row_get_evaluation_count['count_eva'];
  $sql_get_assessment_score = "select * from assessment_score";
  $res_get_assessment_score = $conn->query($sql_get_assessment_score);
  $res_get__count_assessment_score = $conn->query($sql_get_assessment_score);
  $row_count_score = $res_get__count_assessment_score->fetch_assoc();
  $row_count_score = count($row_count_score);
  $i = 0;
  $index_main_radio = 0;
  $check_title_number ='';
  while ($row_get_evaluation = $res_get_evaluation->fetch_assoc()) {
    $json[]  = $row_get_evaluation;
  }
  while ($row_get_assessment_score = $res_get_assessment_score->fetch_assoc()) {
    $ass_score_id_query= substr($row_get_assessment_score['ass_score_id'],-10,-8);
    if ($ass_score_id_query==$ass_cat_id){
      $main_radio[]  = $row_get_assessment_score;
        //ทำปุ่ม radio main_radio
        $check_title_number= substr($row_get_assessment_score['ass_score_id'],-5,-4);
        $main_radio_all[]= substr($row_get_assessment_score['ass_score_id'],-5,-4); // เก็บเป็น array เพื่อ get main radio
        // ค้างไว้
        //end ทำปุ่ม radio main_radio
      if ($check_title_number==1){ //1 คือ ตัวที่ 6 ของลำดับ pk
        $list_score[]  = $row_get_assessment_score;
      }
      if ($main_radio_all[$index_main_radio]==0){ //
        $main_radio_true[]=$check_title_number; //$check_title_number คือ ปุ่ม main_radio เช่น 0 1 2 X เกนการให้คะแนน
        $main_radio_score []= $row_get_assessment_score['ass_score'];
        $main_radio_score_id []= $row_get_assessment_score['ass_score_id'];
      }
      if ($main_radio_all[$index_main_radio]!=$check_title_number){ //
        $main_radio_true[]=$check_title_number; //$check_title_number คือ ปุ่ม main_radio เช่น 0 1 2 X เกนการให้คะแนน
        $main_radio_score []= $row_get_assessment_score['ass_score'];
        $main_radio_score_id []= $row_get_assessment_score['ass_score_id'];
        $index_main_radio++;
      }
  ?>
  <?php
    }
  }
  $arr2 = array_unique($main_radio_true,SORT_REGULAR);
  $arr3 = array_unique($main_radio_score,SORT_REGULAR);
  $arr4 = array_unique($main_radio_score_id,SORT_REGULAR);
  // $result = array_unique();//ตัดค่า araay ที่ซ้ำกันออก
  // $count_obj = count($result);
  $result = array();
  $result_main_radio_score = array();
  $result_main_radio_score_id = array();
  // $old_result = array_unique($array);
  foreach($arr2 as $value){
      array_push($result, $value);
  }
  foreach($arr3 as $value){
      array_push($result_main_radio_score, $value);
  }
  foreach($arr4 as $value){
      array_push($result_main_radio_score_id, $value);
  }
  $data['count_data_eva'] = $check;
  $data['evaluation'] = $json;
  $data['list_score'] = $list_score;
  $data['arr2'] = $arr2;
  $data['main_radio_true'] = $result;
  $data['main_radio_score'] = $result_main_radio_score;
  $data['main_radio_score_id'] = $result_main_radio_score_id;
  echo json_encode($data);
 ?>
