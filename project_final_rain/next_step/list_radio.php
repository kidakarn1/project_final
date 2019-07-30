<?php
  include("../connect/conn.php");
  session_start();
  $title_id = $_POST['title_id'];
  $j = 1;
  $radio ='';
  $sql_get_assessment_score = "select * from assessment_score";
  $res_get_assessment_score = $conn->query($sql_get_assessment_score);
  while ($row_get_assessment_score = $res_get_assessment_score->fetch_assoc()) {
    $ass_score_id_query= substr($row_get_assessment_score['ass_score_id'],-10,-8);
    if ($ass_score_id_query==$_SESSION['ass_cat_id']){
        $mode_cat= substr($row_get_assessment_score['ass_score_id'],-5,-4);
        if ($mode_cat==1){
           $ass_score = $row_get_assessment_score['ass_score'];
           $ass_score_description= $row_get_assessment_score['ass_score_description'];
           $under = "_";
           $radio = $radio."<input type='radio' id='$title_id$under$j' class='list_score' name='$title_id' value='$ass_score'>".$ass_score_description;
          ?>
        <?php
        $j++;
        }
 ?>

 <?php
    }
  }
  echo $radio;
  ?>
