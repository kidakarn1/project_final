<?php
  include('../connect/conn.php');
  session_start();
  $main_radio_score_id = $_POST['main_radio_score_id'];//pk คะแนน หรือ score
  $array_comment = $_POST['array_comment'];
  $eva_id = $_POST['eva_id'];
  $count_assessment = "select max(ass_id) as ass_id_count from assessment";
  $res_count_assessment = $conn->query($count_assessment);
  $row_count_assessment = $res_count_assessment->fetch_assoc();
  $update_main_ass_id="test";
  if (empty($row_count_assessment['ass_id_count'])){
    $ass_id = 1;
  }
  else {
    $ass_id = ($row_count_assessment['ass_id_count']+1);
  }
    $sql_insert_main_assessment = "insert into main_assessment
    (`Assessment_time`,`ass_id`, `total_score`, `pat_id_card_number`, `id_card_number`)
    VALUES
      (
      '$_SESSION[Assessment_time]',
      '$ass_id',
      '',
      '$_SESSION[pat_id_card_number]',
      '$_SESSION[id_card_number]'
      )
      ";
      // echo $sql_insert_main_assessment;
      // exit();
    if ($res_insert_main_assessment = $conn->query($sql_insert_main_assessment)){
        $data=1;
    }else {
        $data=0;
    }
  if ($data==1){
    foreach ($eva_id as $key => $value) {
      if ($array_comment[$key]=='undefined'){
        $array_comment[$key] = "";
      }
      $sql_insert_assessment ="
      INSERT INTO `assessment`(`ass_id`, `eva_id`, `ass_score_id`, `ass_comments`, `hos_id`) VALUES
       (
         '$ass_id',
         '$value',
         '$main_radio_score_id[$key]',
         '$array_comment[$key]',
         '$_SESSION[check_hos_id]'
        )
      ";
      if ($res_insert_assessment = $conn->query($sql_insert_assessment)){
          $data=1;
      }else {
          $data=0;
      }
    }
    if ($data==1){
      $sql_get_main_assessment = "select patold.*,tfull.fullscore,((patold.sumscore *100) /tfull.fullscore) as avg_mode FROM (SELECT main_ass_id,assessment_date , pat_id_card_number,ass_id,mode ,SUM(wtest.score_of_user) as sumscore FROM (select  mh.main_ass_id , mh. assessment_date , mh.pat_id_card_number,am.*,am.a * ase.ass_score as score_of_user from main_assessment as mh , (SELECT `ass_id`,`ass_score_id` ,SUBSTRING(ass_score_id, 1, 2) as mode,COUNT(ass_score_id) as a FROM assessment GROUP by `ass_score_id`) as am ,(SELECT ass_score_id , ass_score from assessment_score )as ase WHERE mh.ass_id = am.ass_id and am.ass_score_id=ase.ass_score_id)as wtest GROUP BY wtest.ass_id) as patold,(SELECT tablemax.id ,tbtest.title_number*  tablemax.idsctitle as fullscore from (SELECT test.title,COUNT(test.title) as title_number FROM (select SUBSTRING( `ass_cat_id`, 1, 2) as title from `evaluation`)as test GROUP BY test.title ) as tbtest,(select SUBSTRING( `ass_score_id`, 1, 2)as id ,max(ass_score) as idsctitle from assessment_score GROUP BY id) as tablemax WHERE tablemax.id =  tbtest.title) as tfull WHERE patold.mode = tfull.id and pat_id_card_number = '$_SESSION[pat_id_card_number]' order by main_ass_id desc limit 1";
      $res_get_main_assessment = $conn->query($sql_get_main_assessment);
      $row_get_main_assessment = $res_get_main_assessment->fetch_assoc();
      $main_ass_id = $row_get_main_assessment['main_ass_id'];
      $ass_cat_id = $row_get_main_assessment['mode'];
      $avg_mode = $row_get_main_assessment['avg_mode'];
      $fullscore = $row_get_main_assessment['fullscore'];
      $sql_max_main = "select max(main_ass_id) as maxmain , max(ass_id) as ass_id  from main_assessment";
      $res_max_main = $conn->query($sql_max_main);
      $row_max_main = $res_max_main->fetch_assoc();
      $max= $row_max_main['maxmain'];
      $ass_id = $row_max_main['ass_id'];
      $sql_get_main="select sum(assessment_score.ass_score) as  sumscore , main_assessment.main_ass_id from assessment ,assessment_score , main_assessment where main_assessment.pat_id_card_number = '$_SESSION[pat_id_card_number]' and assessment.ass_score_id = assessment_score.ass_score_id and  main_assessment.main_ass_id ='$max' and assessment.ass_id = '$ass_id' ";
      $res_get_main = $conn->query($sql_get_main);
      $row_get_main = $res_get_main->fetch_assoc();
      $sumscore = $row_get_main['sumscore'];
      $avg= ($sumscore/$fullscore)*100;
      $sql_count_cat_mode = "select count(ass_cat_id) as count_cat_id from assessment_category";
      $res_count_cat_mode = $conn->query($sql_count_cat_mode);
      $row_count_cat_mode = $res_count_cat_mode->fetch_assoc();
      $count_cat_id = $row_count_cat_mode['count_cat_id'];
      // $total=((100*$count_cat_id)/);
      // echo $sql_total;
      // echo 'test_total===>'.$row_total['avg_total'];
      // exit();
      $update_main_ass_id = "update main_assessment set
        ass_cat_id = '$ass_cat_id',
        sumscore ='$sumscore',
        avg_mode = '$avg'
        where main_ass_id ='$max'
        ";
        if($res_main_ass_id = $conn->query($update_main_ass_id)){
            $data=1;
            $sql_total ="select *  from  main_assessment where Assessment_time = '$_SESSION[Assessment_time]'";
            $res_total = $conn->query($sql_total);
            $avgtotal = 0;
            while ($row_total = $res_total->fetch_assoc()) {
              $avgtotal+= $row_total['avg_mode'];
            }
            $total = (($avgtotal*100)/($count_cat_id*100));
            // echo $sql_total;
            // exit();
            $update_main_total = "update main_assessment set
              total_score = '$total'
              where main_ass_id ='$max'
              ";
              if($res_main_total = $conn->query($update_main_total)){
                $data=1;
              }
              else {
                $data=0;
              }
        }
        else {
          $data=0;
        }
    }
  }
  echo $update_main_ass_id;
  // echo "data_success===>".$data;
  // exit();
  echo $data;
 ?>
