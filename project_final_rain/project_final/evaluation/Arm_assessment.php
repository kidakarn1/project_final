<?php
session_start();
  if (!isset($_SESSION['id_card_number'])){
    echo "<script> window.location.href='../index.php'</script>";
  }
  else {
    include('../connect/conn.php');
    $ass_cat_id = $_REQUEST['id'];
    $sql="select * from assessment_category";
    $sql_get_evaluation = "select *  from evaluation where ass_cat_id = '$ass_cat_id'";
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
    // echo $row_count_score;
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Multi Step Form with Progress Bar using jQuery and CSS3</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="./style.css">
    <!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
</head>
<body>
<form id="msform">
  <input type="hidden" id="sub_data" value="<?php echo $check;?>">
  <ul id="progressbar">
    <?php
    $i=1;
    $index_number = 1;
    while ($row_get_evaluation=$res_get_evaluation->fetch_assoc()) {
      if($i==1){
        echo "<li class='active'></li>";
      }
      else {
        echo "<li></li>";
      }
    ?>
    <?php
    $i++;
    }
    $index = 0;
    $count_data = 0;
    $j=1;
    while ($row_get_evaluation_data = $res_get_evaluation_data->fetch_assoc()) {
    ?>
      <fieldset>
        <h2 class="fs-title"><?php echo $j.'.'.$row_get_evaluation_data['eva_name']; ?></h2>
        <h3 class="fs-subtitle"><button type="button" class="btn btn-primary" onclick="detail_eva_description('<?php echo $row_get_evaluation_data['eva_name'] ?>','<?php echo $row_get_evaluation_data['eva_description'];?>' , '<?php echo $row_get_evaluation_data['eva_note'];?>')">รายละเอียดการ<?php echo $row_get_evaluation_data['eva_name']; ?></button></h3>
        <center>
          <table border="1">
              <?php
                while ($row_get_assessment_score = $res_get_assessment_score->fetch_assoc()) {
                  $ass_score_id_query= substr($row_get_assessment_score['ass_score_id'],-10,-8);
                  if ($ass_score_id_query==$ass_cat_id){
                    $x[] = substr($row_get_assessment_score['ass_score_id'],-5,-4) ;
                      //echo $x[$index];
                     $index++;
                    ?>
              <?php
                  }
                }
          ?>
          <tr>
            <?php
            $count_s = 0;
            $check_data_loop = '';
            $count_readio = 0;
              for ($show_data=0; $show_data<$index; $show_data++) {
                if($check_data_loop!=$x[$show_data]){
                  echo "<td>".$x[$show_data]."</td>";
                  $count_readio++;
                  $s[$count_s]=$x[$show_data];
                  $count_s++;
                }
                $check_data_loop = $x[$show_data];
              }
            ?>
          </tr>
          <tr>
            <?php
            for ($i=0; $i<$count_readio ; $i++) {
              // echo $j."<br>";
              ?>
              <th><input type='radio' name='<?php echo 'score'.$j;?>' value='<?php echo $s[$i]; ?>' onchange="check_score('<?php echo $check?>','<?php echo $s[$i];?>','<?php echo $ass_cat_id;?>','<?php echo $j;?>')" ></th>
            <?php
            }
            ?>
          </tr>
          <b class="show_eva_score">

          </b>
          </table>
        </center>
    <?php
      if ($j>=2 && $j<=$check) {
        echo "<input type='button' name='previous' class='main_score previous action-button' maindata=".$j." value='Previous'/>";
      }
      if ($j>=1 && $j<=($check-1)){
        echo "<input type='button' name='next' class='main_score next action-button' maindata=".$j." value='Next' />";
      }
      if($j==$check) {
        echo "<input type='submit' name='submit' class='submit action-button' value='Submit' />";
      }
      echo "</fieldset>";
      $j++;
    $index_number;} ?>
  </ul>
</form>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="../js/sweetalert.min.js"></script>
<script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script src="../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="../js/javascript_stream_th.js"></script>
<script  src="./script.js"></script>
</body>
</html>
<?php } ?>
