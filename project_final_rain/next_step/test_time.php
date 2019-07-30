<?php
  // echo $eva_times;
 ?>
<body onLoad="begintimer()">
<script language="">

var limit="10:00"
if (document.images){
var parselimit=limit.split(":")
parselimit=parselimit[0]*60+parselimit[1]*1
}
function begintimer(){
if (!document.images)
return
if (parselimit==1)
// เหตุการณ์ที่ต้องการให้เกิดขึ้น
// window.location='page.php'; ถ้าต้องการให้กระโดดไปยัง Page อื่น
frmTest.submit();
else{
parselimit-=1
curmin=Math.floor(parselimit/60)
cursec=parselimit%60
if (curmin!=0)
curtime="เวลาที่เหลือ <font color=red> "+curmin+" </font>นาที กับ <font color=red>"+cursec+" </font>วินาที "
else
if(cursec==0)
{
alert('หมดเวลาแล้วจ้า');
}
else
{
curtime="เวลาที่เหลือ <font color=red>"+cursec+" </font>วินาที "
}
document.getElementById('dplay').innerHTML = curtime;
setTimeout("begintimer()",1000)
}
}
//-->
</script>
<div id=dplay ></div>
<form name="frmTest" action="check.php">
// ใส่ Form
</form>
