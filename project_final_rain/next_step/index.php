<?php
session_start();
	if (!isset($_SESSION['id_card_number'])){
		echo "<script> window.location.href='../index.php'</script>";
	}
	else {
		include('../connect/conn.php');
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>FormWizard_v9</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="colorlib.com">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">
		<!-- DATE-PICKER -->
		  <link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/date-picker/css/datepicker.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="wrapper">
	            <form action="" id="wizard" >
        		<!-- SECTION 1 -->
						<div class="show_number">

						</div> <!--แสดงข้อปัจจุบัน-->
                <h4></h4>
                <section>
                    <h4 class="show_evaluation"></h4> <!-- แสดงหัวข้อการประเมิน -->
                	<div class="form-row">
                        <div class="form-col">
													<div class="form-holder">
													</div>
                            <label for="">
                              <button type="button" class="btn btn-primary btn-sm" onclick="detail_eva_description()">รายละเอียด</button>
                            </label>
														<center>
                            <div class="radio_main">
                            </div>
														<br>
															<div class="show_eva_score">
															</div>
														</center>
                        </div>
                	</div>
									<b class="click_times">
									</b>
                </section>
								<b class="show_previous">
									<input type="button" id="previous" name="button" value="previous">
								</b>
								<b class="show_next">
									<input type="button" id="next" name="button" value="next">
								</b>
								<b  class="show_submit">
									<input type="button" id="submit" name="submit" value="เสร็จสิ้น">
								</b>
								<br>
								<br>
								<b class="show_times">
									<?php include_once("test.php"); ?>
								</b>
            </form>
		</div>
		<script src="js/jquery-3.3.1.min.js"></script>
		<!-- JQUERY STEP -->
		<script src="js/jquery.steps.js"></script>
		<!-- DATE-PICKER -->
		<script src="vendor/date-picker/js/datepicker.js"></script>
		<script src="vendor/date-picker/js/datepicker.en.js"></script>
		<script src="js/main.js"></script>
		<script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
		<script src="../js/javascript_stream_th.js"></script>
<!-- Template created and distributed by Colorlib -->
		<script>

		</script>
</body>
</html>
<?php } ?>
