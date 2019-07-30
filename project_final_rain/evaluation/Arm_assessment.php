<?php
session_start();
  if (!isset($_SESSION['id_card_number'])){
    echo "<script> window.location.href='../index.php'</script>";
  }
  else {
    include('../connect/conn.php');
    $ass_cat_id = $_REQUEST['id'];
    $sql="select * from assessment_category";
    $sql_get_evaluation = "select * from evaluation where ass_cat_id = '$ass_cat_id'";
    $res_get_evaluation = $conn->query($sql_get_evaluation);
    $res_get_evaluation_data = $conn->query($sql_get_evaluation);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Multi Step Form with Progress Bar using jQuery and CSS3</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
  <!-- multistep form -->
<form id="msform">
  <!-- progressbar -->
  <ul id="progressbar">
    <?php
    $i=1;
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
    $j=1;
    while ($row_get_evaluation_data = $res_get_evaluation_data->fetch_assoc()) {
    ?>
      <fieldset>
        <h2 class="fs-title"><?php echo $j.'.'.$row_get_evaluation_data['eva_name']; ?></h2>
        <h3 class="fs-subtitle"><button type="button" class="btn btn-primary" onclick="detail('<?php echo $row_get_evaluation_data['eva_description'];?>' , '<?php echo $row_get_evaluation_data['eva_note'];?>')">รายละเอียดการ<?php echo $row_get_evaluation_data['eva_name']; ?></button></h3>
        <input type="text" name="email" placeholder="Email" />
        <input type="password" name="pass" placeholder="Password" />
        <input type="password" name="cpass" placeholder="Confirm Password" />
    <?php
      if ($j>1){
        echo "<input type='button' name='previous' class='previous action-button' value='Previous' />";
      }
      echo "<input type='button' name='next' class='next action-button' value='Next' />";
      echo "</fieldset>";
      $j++;
    } ?>
    <!-- <li class="active"></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li> -->
  </ul>
  <!-- fieldsets -->
  <!-- <fieldset>
    <h2 class="fs-title">Create your account</h2>
    <h3 class="fs-subtitle">This is step 1</h3>
    <input type="text" name="email" placeholder="Email" />
    <input type="password" name="pass" placeholder="Password" />
    <input type="password" name="cpass" placeholder="Confirm Password" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Social Profiles</h2>
    <h3 class="fs-subtitle">Your presence on the social network</h3>
    <input type="text" name="twitter" placeholder="Twitter" />
    <input type="text" name="facebook" placeholder="Facebook" />
    <input type="text" name="gplus" placeholder="Google Plus" />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Personal Details</h2>
    <h3 class="fs-subtitle">We will never sell it</h3>
    <input type="text" name="fname" placeholder="First Name" />
    <input type="text" name="lname" placeholder="Last Name" />
    <input type="text" name="phone" placeholder="Phone" />
    <textarea name="address" placeholder="Address"></textarea>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" class="submit action-button" value="Submit" />
  </fieldset> -->
</form>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script  src="./script.js"></script>
</body>
</html>
<?php } ?>
