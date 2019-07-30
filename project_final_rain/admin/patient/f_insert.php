<?php $a = 'admin'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      include("../../connect/conn.php");
      include("../../menu.php");
      // $hn = $_REQUEST['hn'];
      // $sql = "select * from  patient,title_name,hospital,hospital_category,relationship_status where
      // patient.hn = '$hn' and
      // patient.title_id = title_name.title_id and
      // patient.rel_id = relationship_status.rel_id and
      // patient.hos_id = hospital.hos_id and
      // hospital.host_cat_id = hospital_category.host_cat_id";
      // $res = $conn->query($sql);
      // $row = $res->fetch_assoc();

      $sql_title_name = "select * from title_name";
      $res_title_name = $conn->query($sql_title_name);

      $sql_rel = "select * from relationship_status";
      $res_rel = $conn->query($sql_rel);

      $sql_hos = "select * from hospital";
      $res_hos = $conn->query($sql_hos);

      // $sql_host = "select * from hospital_category";
      // $res_host = $conn->query($sql_host);
    ?>
    <form method="post" action="insert.php">

      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">hn</label>
        <div class="col-sm-10">
          <input type="text" name="hn" class="form-control">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">title_name</label>
        <select class="col-sm-10" name="title_id">
          <?php while ($row_title_name = $res_title_name->fetch_assoc()) { ?>
            <option value="<?php echo $row_title_name['title_id'] ?>"><?php echo $row_title_name['title_name'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">pat_fname</label>
        <div class="col-sm-10">
          <input type="text" name="pat_fname" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">pat_lname</label>
        <div class="col-sm-10">
          <input type="text" name="pat_lname" class="form-control" >
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">age</label>
        <div class="col-sm-10">
          <input type="text" name="age" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">weight</label>
        <div class="col-sm-10">
          <input type="text" name="weight" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">height</label>
        <div class="col-sm-10">
          <input type="text" name="height" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">career</label>
        <div class="col-sm-10">
          <input type="text" name="career" class="form-control">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">rel_id</label>
        <select class="col-sm-10" name="rel_id">
          <?php while ($row_rel = $res_rel->fetch_assoc()) { ?>
            <option value="<?php echo $row_rel['rel_id'] ?>"><?php echo $row_rel['rel_name'] ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">stroke_days</label>
        <div class="col-sm-10">
          <input type="date" name="stroke_days" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">doctor_diagnosis</label>
        <div class="col-sm-10">
          <input type="text" name="doctor_diagnosis" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">physical_therapy_diagnosis</label>
        <div class="col-sm-10">
          <input type="text" name="physical_therapy_diagnosis" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">important_symptoms_patients</label>
        <div class="col-sm-10">
          <input type="text" name="important_symptoms_patients" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">history_of_physical_therapy_treatment</label>
        <div class="col-sm-10">
          <input type="text" name="history_of_physical_therapy_treatment" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">warning</label>
        <div class="col-sm-10">
          <input type="text" name="warning" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">congenital_disease</label>
        <div class="col-sm-10">
          <input type="text" name="congenital_disease" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">drug_allergy_history</label>
        <div class="col-sm-10">
          <input type="text" name="drug_allergy_history" class="form-control">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">hos_id</label>
        <select class="col-sm-10" name="hos_id">
          <?php while ($row_hos = $res_hos->fetch_assoc()) { ?>
            <option value="<?php echo $row_hos['hos_id'] ?>"><?php echo $row_hos['hos_name'] ?></option>
          <?php } ?>
        </select>
      </div>
      <!-- <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">hos_id</label>
        <select class="col-sm-10" name="host_cat_id">
          <?php //while ($row_hos_cat = $res_host->fetch_assoc()) { ?>
            <option value="<?php //echo $row_hos_cat['host_cat_id'] ?>"><?php //echo $row_hos_cat['host_cat_name'] ?></option>
          <?php //} ?>
        </select>
      </div> -->

      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">id_card_number</label>
        <div class="col-sm-10">
          <input type="text" name="id_card_number" class="form-control" >
        </div>
      </div>


      <div class="form-group row">
        <input type="submit" value="ตกลง">
      </div>
    </form>

  </body>
</html>
