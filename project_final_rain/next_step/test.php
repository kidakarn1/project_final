<?php
 $eva_times = $_POST['eva_times'];
 $status_times = $_POST['status_times'];
 ?>
 <input type="hidden" id="seting_time" value="<?php echo $eva_times; ?>">
 <input type="hidden" id="status_times" value="<?php echo $status_times; ?>">
 <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body onLoad="begintimer()">
<p>&nbsp;</p>
<table width="500" border="1" align="center">
  <tr><td align="center"><h1><b>โปรแกรมนับเวลาถอยหลัง</b></h1></td></tr>
  <tr>
    <td align="center">
    <script language="">
var seting_time = document.getElementById("seting_time").value;
var status_times = document.getElementById("status_times").value;
var limit = seting_time
if (document.images){
var parselimit=limit.split(":")
parselimit=parselimit[0]*60+parselimit[1]*1
}
function begintimer(){
if (!document.images)
return
if (parselimit==0){
  // alert('หมดเวลา')
  console.log('OK');
  // เหตุการณ์ที่ต้องการให้เกิดขึ้น
  // window.location='page.php'; ถ้าต้องการให้กระโดดไปยัง Page อื่น
  // frmTest.submit();
}
else{
parselimit-=1
curmin=Math.floor(parselimit/60)
cursec=parselimit%60
if(status_times=='stop'){
  limit = 0;
  // break;
  // alert('หมดเวลาแล้วจ้า');
}
else  {
  if (curmin!=0)
  curtime="เวลาที่เหลือ <font color=red> "+curmin+" </font>นาที กับ <font color=red>"+cursec+" </font>วินาที "
  else
  {
    curtime="เวลาที่เหลือ <font color=red>"+cursec+" </font>วินาที "
  }
}
document.getElementById('dplay').innerHTML = curtime;
setTimeout("begintimer()",1000)
}
}
//-->
</script>
<div id=dplay ></div>
<!-- <form name="frmTest" action="check.php">

</form></td> -->
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
