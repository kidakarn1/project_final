$(document).ready(function() {
  sub_data = $("#sub_data").val()
  for (var i = 1; i <=sub_data; i++) {
    array_check[i] = ''
  }
  $(".show_data").load("from_login.php");
  get_hospital();
});
var i = 1;
var check_point = 1;
var count_readio = 1;
var title_id = 1;
var title_id_Previous = 0
var count_parameter = 1;//count_parameter = ข้อ score = คะแนน
var array_score =[];
var array_check = {};
var key_radio = 0
var check1 = 0
var check_readio_score = ''
function return_score_default(title_number){
  this.count_parameter--;
  console.log(this.count_parameter);
  var text = 'checked';
  $('').html(text);
}
function show_test(title_id,score){
   // var score = $("input[name='score']").val();
   // console.log(score.length);
   for (var i = this.count_parameter; i < (this.count_parameter+1); i++) {
     if (title_id==i){
       this.array_score[i] = score
       // console.log('ข้อ' + count_parameter+ 'หัวข้อคะแนน',this.array_score[i]);
     }
     else {
      this.count_parameter++;
     }
   }
}
function check_score(number,score,para,title_id){
  // show_test(title_id,score);
  check_readio_score = score
  var index_score = "";
  if (score==1){
    check1 = 1;
    index_score = 1;
    var path = $.ajax({
      url:'query_show_eva_score.php',
      type:"POST",
      datatype:"json",
      data:{
        value_score:1,
        index_score:index_score,
        para:para
       }
    });
    path.done(function(data){
      var data = JSON.parse(data);
      console.log(data);
      var row= '';
      $.each(data.data,function(key,value){
       row += get_score(value.ass_score_id,value.ass_score_description,value.ass_score,title_id,key);// ชื่อฟิลด์ ออกมาจาก ฐานข้อมูลโดยจะได้จากหน้า ที่ ปั้น array
      })
      $(".show_eva_score").html(row);
    });
  }
  else if (score=='X') {
    index_score  = "<tr><th><textarea name='detail_score_zero' id='detail_score_zero'></textarea></th></tr>";
     $('.show_eva_score').html(index_score)
  }
  else {
    index_score='';
    $('.show_eva_score').html(index_score);
  }
}
var  tid= 0
var  keyid= 0
function get_score(ass_score_id,ass_score_description,ass_score,title_id,key){
  var row = ''
  tid = title_id
  keyid = key
  if (this.check_point<=2){//check radio
    this.count_readio;
  }
  else {
    this.check_point++;
    this.count_readio++;
  }
    row += "<input type='radio' data ='"+key+"' class='list_score' id='"+tid+'_'+keyid+"' name='"+count_parameter+'_'+this.count_readio+"' value='"+ass_score_id+"'>"+ass_score_description
    this.i++;
    return row;
}
key_radio = 1
$(document).on("click","input[name=next]",function(){
  if ($(this).attr("name")=="score"){
    array_check[key_radio] = $(this).attr("id")
    alert("qeqweqeq");
  }
})
$(document).on("click","input[class=list_score]",function(){
  if ($(this).attr("class")=="list_score"){
    array_check[key_radio] = $(this).attr("id")
    console.log(array_check);
  }
})
$(document).on("click","input[type=button]",function(){
  key_radio =  parseInt($(this).attr("maindata"))+1
  $.each(array_check, function(key,value) {
    if(value){
      $('#'+value).attr('checked', 'checked');
    }
  });
})
$(document).on("click","input[value=Previous]",function(){
  // if (check1==1){
    tid = tid--
    keyid = keyid--
    title_id_Previous = parseInt($(this).attr("maindata"))-1
    console.log("====>"+array_check[title_id_Previous]);
  // }
})
function get_hospital(){
  var pathname = window.location.pathname; // Returns path only (/path/example.html)
  if (pathname=='/project_final/personnel/New_patient.php'){
    if($("#host_cat_id").val()!=''){
      host_cat_id = $("#host_cat_id").val();
    }
    else {
      host_cat_id = '1'//รหัสโรงพยาบาล
    }
    path = $.ajax({
      url:'query_hospital.php',
      type:"POST",
      datatype:"json",
      data:{
        host_cat_id:host_cat_id
      }
    });
    path.done(function(data){
     var row = '';
     var hos_id='';
     var show='';
     var data = JSON.parse(data);
     console.log(data);
     $.each(data.data,function(key,value){
        console.log(value.hos_id);
       row += mRow(value.hos_id,value.hos_name);// ชื่อฟิลด์ ออกมาจาก ฐานข้อมูลโดยจะได้จากหน้า ที่ ปั้น array
       hos_id += value.hos_id;
     })
     show += "<select id='hos_id' name='hos_id'>"
     show += row
     show += "</select>"
     $(".show_hospital").html(show)
   });
  }
}
function detail_eva_description(eva_name,detail,warning){
  var warning = (warning!='')?'<br><br>'+'<b>คำเตือน<b><br>'+warning :'';
  Swal.fire(
    '<span style="color:#000000">รายละเอียด</span>',
    detail +'<span style="color:#FF0000">'+warning+'</span>',
    'question'
  );
}
function mRow(hos_id,hos_name){
  var row = ''
    row += "<option value='"+hos_id+"'>"+hos_name+"</option>"
    console.log(hos_name);
    return row
}
function someFunction21() {
  setTimeout(function () {
  $('#horizontal-stepper').nextStep();
  }, 2000);
}
function reset_assessor(){
 $("input[name='id_card_number']").val('');
 $("input[name='per_username']").val('');
 $("input[name='per_password']").val('');
 $("input[name='per_fname']").val('');
 $("input[name='per_lname']").val('');
 $("input[name='per_email']").val('');
 $("input[name='per_phone']").val('');
 $("input[name='per_department']").val('');
}
function register_assessor(){
  var id_card_number = $("input[name='id_card_number']").val();
  var per_username = $("input[name='per_username']").val();
  var per_password = $("input[name='per_password']").val();
  var title_id = $("#title_id").val();
  var per_fname = $("input[name='per_fname']").val();
  var per_lname = $("input[name='per_lname']").val();
  var per_email = $("input[name='per_email']").val();
  var per_phone = $("input[name='per_phone']").val();
  var per_department = $("input[name='per_department']").val();
  if (id_card_number===''){
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอก เลขบัตรประชาชน',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (checkID(id_card_number)==false) {
    Swal.fire({
      type: 'error',
      title: 'รหัสประชาชนไม่ถูกต้อง',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (per_username==='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอก ชื่อผู้ใช้',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (per_password==='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอก รหัสผ่าน',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (per_fname==='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอก ชื่อ',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (per_lname==='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอก นามสกุล',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (per_email==='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอก emial',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (per_phone==='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอก เบอร์โทรศัพท์',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (per_department==='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอก หน่วยงาน',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
 else {
 path = $.ajax({
   url:'personnel/insert_personnel.php',
   type:"POST",
   datatype:"json",
   data:{
     id_card_number:id_card_number,
     per_username:per_username,
     per_password:per_password,
     title_id:title_id,
     per_fname:per_fname,
     per_lname:per_lname,
     per_email:per_email,
     per_phone:per_phone,
     per_department:per_department
    }
  });
    path.done(function(data){
      console.log(data);
      if (data==0){
        Swal.fire({
          type: 'warning',
          title: 'เลขบัตรประชาชนนี้มีผู้ใช้แล้ว'
        });
      }
      else if (data==200){
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-primary'
          },
          buttonsStyling: false,
        })
        swalWithBootstrapButtons.fire({
          title: 'สมัครเสร็จสิ้น',
          text: "กรุณาเลือก",
          type: 'success',
          showCancelButton: true,
          confirmButtonText: 'เข้าสู่ระบบอัตโนมัติ',
          cancelButtonText: 'ตกลง',
          reverseButtons: true
        }).then((result) => {
          if (result.value) {
            var path ='';
            path = $.ajax({
              url:'check_login.php',
              type:"POST",
              datatype:"json",
              data:{username:per_username , password:per_password}
            });
            path.done(function(data){
              console.log(data);
              window.location.href='personnel/menu_personnel.php';
            });
          } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
          ) {
              window.location.href='index.php'
          }
        })
      }
        else if (data==400) {
          Swal.fire({
            type: 'error',
            title: 'สมัครไม่สำเร็จ',
            text: '<button type="button">เข้าสู่ระบบอัตโนมัติ</button>'
          });
        }
    })
  }
}
function check_login(){
  var username = $("input[name='username']").val();
  var password = $("input[name='password']").val();
  console.log(username);
  var path ='';
  if (username=='' || password==''){
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอก username หรือ password',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
    else {
      path = $.ajax({
      url:'check_login.php',
      type:"POST",
      datatype:"json",
      data:{username:username , password:password}
    });
    path.done(function(data){
      console.log(data);
      if (data==='0'){
        Swal.fire({
          type: 'error',
          title: 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
          text: 'กรุณาลองใหม่อีกครั้ง'
        });
      }
      else{
        Swal.fire({
          type: 'success',
          title: 'เข้าสู่ระบบสำเร็จ',
          text: 'OK'
        });
        window.location.href='personnel/menu_personnel.php';
      }
    });
  }
}
function next_New_patient(){
  window.location.href='New_patient.php';
}
function next_search_patient(){
  window.location.href='../search_patient.php';
}
function next_Arm_assessment(ass_cat_id){
  console.log(ass_cat_id);
  window.location.href="../next_step/index.php?id="+ass_cat_id;
  // window.location.href="../evaluation/Arm_assessment.php?id="+ass_cat_id;
}
function detail(eva_description,eva_note){
  console.log(eva_description);
  console.log(eva_note);
}
function search_patient_old(hn,hos_id){
  console.log(hn);
  console.log(hos_id);
  window.location.href='personnel/New_patient_old.php?hn='+hn+'&hos_id='+hos_id;
}
function menu_evaluation(){
  var hos_id = $("#hos_id").val();
  var host_cat_id = $("#host_cat_id").val();
  var hn = $("#hn").val();
  var id_card_number = $("#id_card_number").val();
  var hos_id = $("#hos_id").val();
  var title_id = $("#title_id").val();
  var pat_fname = $("#pat_fname").val();
  var pat_lname = $("#pat_lname").val();
  var age = $("#age").val();
  var weight = $("#weight").val();
  var height = $("#height").val();
  var career = $("#career").val();
  var rel_id = $("#rel_id").val();
  var stroke_days = $("#stroke_days").val();
  var doctor_diagnosis = $("#doctor_diagnosis").val();
  var physical_therapy_diagnosis = $("#physical_therapy_diagnosis").val();
  var important_symptoms_patients = $("#important_symptoms_patients").val();
  var history_of_physical_therapy_treatment = $("#history_of_physical_therapy_treatment").val();
  var warning = $("#warning").val();
  var congenital_disease = $("#congenital_disease").val();
  var drug_allergy_history = $("#drug_allergy_history").val();
  console.log(hn);
  if (hos_id==''){
    Swal.fire({
      type: 'warning',
      title: 'กรุณาเลือกโรงพยาบาล',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (hn=='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอก หมายเลข HN',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (id_card_number=='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอกเลขบัตรประชาชนผู้ป่วย',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (checkID(id_card_number)==false) {
    Swal.fire({
      type: 'error',
      title: 'รหัสประชาชนไม่ถูกต้อง',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (pat_fname=='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอกชื่อสกุลผู้ป่วย',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (pat_lname=='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอกนามสกุลผู้ป่วย',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (age=='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอกอายุป่วย',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (weight=='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอกน้ำหนักผู้ป่วย',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (height=='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอกส่วนสูงผู้ป่วยหนักผู้ป่วย',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (career=='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอกอาชีพ หรือกิจกรรมที่ทำเป็นประจำ',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (rel_id=='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณาเลือกสถานะภาพ',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (stroke_days=='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณาเลือกวันที่ป่วยเป็นโรคหลอดเลือดสมอง',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (doctor_diagnosis=='') {
      Swal.fire({
        type: 'warning',
        title: 'กรุณากรอกการวินิจฉัยของแพทย์',
        text: 'กรุณาลองใหม่อีกครั้ง'
      });
  }
  else if (physical_therapy_diagnosis=='') {
      Swal.fire({
        type: 'warning',
        title: 'กรุณากรอกการวินิจฉัยทางกายภาพบำบัด',
        text: 'กรุณาลองใหม่อีกครั้ง'
      });
  }
  else if (important_symptoms_patients=='') {
      Swal.fire({
        type: 'warning',
        title: 'กรุณากรอกการอาการสำคัญผู้ป่วย',
        text: 'กรุณาลองใหม่อีกครั้ง'
      });
  }
  else {
    var path ='';
    path = $.ajax({
      url:'insert_New_patient.php',
      type:"POST",
      datatype:"json",
      data:{
        host_cat_id:host_cat_id,
        hos_id:hos_id,
        hn:hn,
        hos_id:hos_id,
        id_card_number:id_card_number,
        title_id:title_id,
        pat_fname:pat_fname,
        pat_lname:pat_lname,
        age:age,
        weight:weight,
        height:height,
        career:career,
        rel_id:rel_id,
        stroke_days:stroke_days,
        doctor_diagnosis:doctor_diagnosis,
        physical_therapy_diagnosis:physical_therapy_diagnosis,
        important_symptoms_patients:important_symptoms_patients,
        history_of_physical_therapy_treatment:history_of_physical_therapy_treatment,
        warning:warning,
        congenital_disease:congenital_disease,
        drug_allergy_history:drug_allergy_history
      }
    });
    path.done(function(data){
      console.log(data);
      if (data=='0'){
        Swal.fire({
          type: 'warning',
          title: 'หมายเลข HN นี้มีการใช้งานแล้ว ในโรงพยาบาลนี้',
          text: 'กรุณาลองใหม่อีกครั้ง'
        });
      }
      else if (data=='200') {
        window.location.href='menu_evaluation.php';
      }
      else {
        Swal.fire({
          type: 'error',
          title: 'ผิดพลาด ติดต่อ เจ้าหน้าที่ผู้ดูแลระบบ',
          text: 'กรุณาลองใหม่อีกครั้ง'
        });
      }
    //window.location.href='personnel/menu_evaluation.php';
    })
  }
}
function checkID(id){
  if(id.length != 13) return false;
  for(i=0, sum=0; i < 12; i++)
  sum += parseFloat(id.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id.charAt(12)))
  return false; return true;
}
function checkForm(){
	if(!checkID(document.form1.txt1.value)){
  	txt1.focus();
  	return false;
	}
}
function menu_evaluation_old(){
  // window.location.href='Arm_assessment.php';
  var hos_id = $("#hos_id").val();
  var host_cat_id = $("#host_cat_id").val();
  var hn = $("#hn").val();
  var id_card_number = $("#id_card_number").val();
  var hos_id = $("#hos_id").val();
  var title_id = $("#title_id").val();
  var pat_fname = $("#pat_fname").val();
  var pat_lname = $("#pat_lname").val();
  var age = $("#age").val();
  var weight = $("#weight").val();
  var height = $("#height").val();
  var career = $("#career").val();
  var rel_id = $("#rel_id").val();
  var stroke_days = $("#stroke_days").val();
  var doctor_diagnosis = $("#doctor_diagnosis").val();
  var physical_therapy_diagnosis = $("#physical_therapy_diagnosis").val();
  var important_symptoms_patients = $("#important_symptoms_patients").val();
  var history_of_physical_therapy_treatment = $("#history_of_physical_therapy_treatment").val();
  var warning = $("#warning").val();
  var congenital_disease = $("#congenital_disease").val();
  var drug_allergy_history = $("#drug_allergy_history").val();
  if (age=='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอกอายุป่วย',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (weight=='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอกน้ำหนักผู้ป่วย',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (height=='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอกส่วนสูงผู้ป่วยหนักผู้ป่วย',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (career=='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณากรอกอาชีพ หรือกิจกรรมที่ทำเป็นประจำ',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (rel_id=='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณาเลือกสถานะภาพ',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (stroke_days=='') {
    Swal.fire({
      type: 'warning',
      title: 'กรุณาเลือกวันที่ป่วยเป็นโรคหลอดเลือดสมอง',
      text: 'กรุณาลองใหม่อีกครั้ง'
    });
  }
  else if (doctor_diagnosis=='') {
      Swal.fire({
        type: 'warning',
        title: 'กรุณากรอกการวินิจฉัยของแพทย์',
        text: 'กรุณาลองใหม่อีกครั้ง'
      });
  }
  else if (physical_therapy_diagnosis=='') {
      Swal.fire({
        type: 'warning',
        title: 'กรุณากรอกการวินิจฉัยทางกายภาพบำบัด',
        text: 'กรุณาลองใหม่อีกครั้ง'
      });
  }
  else if (important_symptoms_patients=='') {
      Swal.fire({
        type: 'warning',
        title: 'กรุณากรอกการอาการสำคัญผู้ป่วย',
        text: 'กรุณาลองใหม่อีกครั้ง'
      });
  }
  else {
    var path ='';
    path = $.ajax({
      url:'update_patient.php',
      type:"POST",
      datatype:"json",
      data:{
        host_cat_id:host_cat_id,
        hos_id:hos_id,
        hn:hn,
        id_card_number:id_card_number,
        title_id:title_id,
        pat_fname:pat_fname,
        pat_lname:pat_lname,
        age:age,
        weight:weight,
        height:height,
        career:career,
        rel_id:rel_id,
        stroke_days:stroke_days,
        doctor_diagnosis:doctor_diagnosis,
        physical_therapy_diagnosis:physical_therapy_diagnosis,
        important_symptoms_patients:important_symptoms_patients,
        history_of_physical_therapy_treatment:history_of_physical_therapy_treatment,
        warning:warning,
        congenital_disease:congenital_disease,
        drug_allergy_history:drug_allergy_history
      }
    });
    console.log(hos_id);
    path.done(function(data){
      console.log(data);
      if (data=='0'){
        Swal.fire({
          type: 'warning',
          title: 'หมายเลข HN นี้มีการใช้งานแล้ว ในโรงพยาบาลนี้',
          text: 'กรุณาลองใหม่อีกครั้ง'
        });
      }
      else if (data=='200') {
        window.location.href='menu_evaluation.php';
      }
      else {
        Swal.fire({
          type: 'error',
          title: 'ผิดพลาด ติดต่อ เจ้าหน้าที่ผู้ดูแลระบบ',
          text: 'กรุณาลองใหม่อีกครั้ง'
        });
      }
    })
  }
}
