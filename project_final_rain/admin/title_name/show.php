<?php $a = 'admin'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <title>Webslesson Tutorial | Datatables Jquery Plugin with Php MySql and Bootstrap</title>
  </head>
  <body>
    <?php
    include("../../connect/conn.php");
    include("../../menu.php");
    ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/fh-3.1.4/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.css"/>

    <?php $sql = "select * from title_name";
    $res = $conn->query($sql);
    ?>
    <div class="container">
      <div class="table-responsive">
        <table id="title_name" class="table table-striped table-bordered">
          <thead>
              <tr>
                <th>title_id</th>
                <th>title_name</th>
                <th>การจัดการ</th>
                <th><a href="f_insert.php">เพื่ม</a></th>
              </tr>
          </thead>
          <tbody>
            <?php while ($row = $res->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $row['title_id']; ?></td>
              <td><?php echo $row['title_name']; ?></td>
              <td><a href="f_edit_title_name.php?title_id=<?php echo $row['title_id'];?>">แก้ไข</a></td>
              <td><a href="delete.php?title_id=<?php echo $row['title_id'];?>">ลบ</a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/fh-3.1.4/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>
  </body>
</html>
<script>
 $(document).ready(function(){
      $('#title_name').DataTable();
 });
 </script>
