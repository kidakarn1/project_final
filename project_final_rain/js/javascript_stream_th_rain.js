$(document).ready(function() {
  var pathname = window.location.pathname; // Returns path only (/path/example.html)
  if (pathname=='/project_final_rain/personnel/New_patient.php'){
    path = $.ajax({
      url:'query_patient.php',
      type:"POST",
      datatype:"json",
      })
    path.done(function(data){
      data_patient = JSON.parse(data);
      console.log('data_pat=====>',data_patient);
    })
    $("#id_card_number").keyup(function(){
        var check_id_card_number = $(this).val();
        if ($(this).val() !== ''){
            $(this).css("background-color", "#FFFFFF")
        } else {
            $(this).css("background-color", '#FFFFFF')
        }
        $.each(data_patient.data,function(key,value){
          goball_hos = value.host_cat_id;
          // console.log('check_id_card_number::',check_id_card_number);
          // console.log('value===>',value.id_card_number);
          if(value.id_card_number==check_id_card_number){
            // alert(value.title_id);
            $('#hn').attr('disabled',true);//ปิด hn
            $("option[id=host_cat_id" + value.host_cat_id + "]").prop("selected",true);//โชว์ สถาบัน :
            get_hospital(value.host_cat_id);
            $("option[value='asd2']").prop("selected",true);//โชว์ สังกัด ร.พ
            console.log('hos_id-+__+_+_+===>',value.hos_id);
            hos_id_naja = value.hos_id
            $("option[id=rel_id" + value.rel_id + "]").prop("selected",true);//โชว์  สถานะภาพ
            $("option[id=title_id_pat" + value.title_id + "]").prop("selected",true);//โชว์ สังกัด
            $('#hn').val(value.hn);
            $('#pat_fname').val(value.pat_fname);
            $('#pat_lname').val(value.pat_lname);
            $('#age').val(value.birthday);
            $('#age_pagunub').text(age(new Date(value.birthday)));
            $('#weight').val(value.weight);
            $('#height').val(value.height);
            $('#career').val(value.career);
            $('#stroke_days').val(value.stroke_days);
            $('#doctor_diagnosis').val(value.doctor_diagnosis);
            $('#physical_therapy_diagnosis').val(value.physical_therapy_diagnosis);
            $('#important_symptoms_patients').val(value.important_symptoms_patients);
            $('#history_of_physical_therapy_treatment').val(value.history_of_physical_therapy_treatment);
            $('#warning').val(value.warning);
            $('#congenital_disease').val(value.congenital_disease);
            $('#drug_allergy_history').val(value.drug_allergy_history);
            $("#show_check_pat").text('มีข้อมูล');
            return false;
          }
          else if (check_id_card_number=='') {
            $("#show_check_pat").html('');
            $('#hn').attr('disabled',false);
          }
          else {
            if (checkID(check_id_card_number)==false) {
              $("#show_check_pat").html('เลขบัตรไม่ถูกต้อง');
            }
            else {
                $("#show_check_pat").html('เลขบัตรถูกต้อง');
            }
            $("option[id=rel_id" + value.rel_id + "]").prop("selected",false);//โชว์  สถานะภาพ
            $("option[id=title_id_pat" + value.title_id + "]").prop("selected",false);//โชว์ สังกัด
            $("option[value=" + value.host_cat_id + "]").prop("selected",false);
            get_hospital(value.host_cat_id);
            $("option[value=" + value.hos_id + "]").prop("selected",false);
            $('#hn').attr('disabled',false);
            $('#hn').val('');
            $('#pat_fname').val('');
            $('#pat_lname').val('');
            $('#age').val('');
            $('#age_pagunub').text('');
            $('#weight').val('');
            $('#height').val('');
            $('#career').val('');
            $('#stroke_days').val('');
            $('#doctor_diagnosis').val('');
            $('#physical_therapy_diagnosis').val('');
            $('#important_symptoms_patients').val('');
            $('#history_of_physical_therapy_treatment').val('');
            $('#warning').val('');
            $('#congenital_disease').val('');
            $('#drug_allergy_history').val('');
          }
        })
    });
  }
  if (pathname=='/project_final_rain/next_step/index.php'){
   $('.show_times').hide();//ซ่อนเวลา
    evaluation = JSON.parse(localStorage.getItem("data_eva"))
    data_list_score = JSON.parse(localStorage.getItem("data_list_score"))
    main_radio_score = JSON.parse(localStorage.getItem("main_radio_score"))
    title_number = parseInt(localStorage.getItem("title_number"))-1
    btn_main_radio = JSON.parse(localStorage.getItem("main_radio_true"))
    main_radio_score_id = JSON.parse(localStorage.getItem("main_radio_score_id"))
    console.log(main_radio_score_id);
    var size_radio_main = parseInt(localStorage.getItem("size_radio_main"))
    var row_radio_main = "<table border='1'><tr>"
    // row_radio_main += "<th><input type='radio'class='main_radio'name='"+(title_number+1)+"' value='0'>0</th>"
    for (var i = 0; i < btn_main_radio.length; i++) {
      var name_radio_main =title_number+1
      row_radio_main += "<th><input type='radio'id='"+main_radio_score_id[i]+"'class='main_radio'name='"+name_radio_main+"' value='"+btn_main_radio[i]+"'>"+btn_main_radio[i]+"</th>"
    }
   $('.radio_main').html(row_radio_main+"</tr></table>") //set -ค่าลง html
   $('.show_previous').hide();
   $('.show_submit').hide()
   $(".show_evaluation").html(localStorage.getItem("title_number")+' '+ evaluation[title_number].eva_name);
  }
  sub_data = $("#sub_data").val()
  count_data_eva = parseInt(localStorage.getItem("count_data_eva"))
  for (var i = 0; i <count_data_eva; i++) {
    data_list_score[i]//id score เช่น LE00000001
    main_radio_score_id[i]=''//เก็บ id ของ main main radio
    array_check_main_radio[i] = ''// เก็บ การเลือก main radio หลัก
    array_check[i] = ''// เก็บ การเลือก list radio ย่อยของข้อ1
    array_comment[i] =''// เก็บ comment
    show_list_radio[i] = ''// เก็บคำถามจากการเลือก radio ข้อ 1 แต่ละข้อ
    eva_id[i]=''//pk หัวข้อการประเมิน
  }
  $(".show_data").load("from_login.php");
  get_hospital('');
  $('.show_number').html((title_number+1)+'/'+count_data_eva) //เริ่มแสดง ห้อข้อการประเมิน ลำดับ
  $('.main_radio').change(function(){
    score = $(this).val();
    array_check_main_radio[title_number] = score//radio ที่เลือก ครั้งที่ 2
    main_radio_score_id[title_number] = $(this).attr("id");//radio ที่เลือก ID เช่น LE00000001
    console.log("main_radio_score_id[title_number]",main_radio_score_id);
    console.log("array_check_main_radio[title_number]::::>>",array_check_main_radio);
    // console.log("main_radio_score_id[title_number]"+main_radio_score_id[title_number]);
    if (score==1){
      list_radio =''
      var data_list_score = JSON.parse(localStorage.getItem("data_list_score"))
      // console.log(list_radio);
      for (var i = 0; i < data_list_score.length; i++) {
         list_radio += "<input type='radio' id ='"+data_list_score[i].ass_score_id+"' class='list_score' name='list_score'>"+"<h6>"+data_list_score[i].ass_score_description+"</h6>"+"<br>";
      }
      show_list_radio[title_number] = list_radio
      $(".show_eva_score").html(show_list_radio[title_number])
    }else if (score=='X') {
      textarea  = "<textarea name='detail_score_zero' class='detail_score_zero' id='detail_score_zero'></textarea>"
      $(".show_eva_score").html(textarea)
      // $( ".show_eva_score" ).load("detail_score.php")
      // $("input[type='text']").val('asdadsad');
      // $( ".show_eva_score" ).show();
    }else {
      $(".show_eva_score").html('')
    }
  })
  $("#submit").click(function(){
    eva_id[title_number] = evaluation[title_number].eva_id; //ให้ค่า หัวข้อการประเมิน เพื่อให้ข้อสุดท้ายเก็บค่าด้วย
    console.log('=====>',eva_id);
    array_comment[title_number] = $('#detail_score_zero').val();
    console.log("array_check_main_radio===>>>>>>",array_comment);
    $.each( main_radio_score_id, function( key, value ) {
      if(!value){
        Swal.fire({
          type: 'warning',
          title: 'กรุณาประเมินข้อที่เหลือ',
          text: 'ได้แก่ข้อ'+(key+1)
        });
        bool_insert = false
        return bool_insert;
      }
      else {
        bool_insert = true;
      }
    });
      $.each( main_radio_score_id, function( key_list_radio, value_list_radio ) {
        if (array_check_main_radio[key_list_radio]=="1"){
        if(!value_list_radio){
          Swal.fire({
            type: 'warning',
            title: 'กรุณาประเมินข้อย่อย',
            text: 'ได้แก่ข้อ'+(key_list_radio+1)
          });
        }
      }
    })
    if (bool_insert){
      console.log('array_comment======>',array_comment);
      path = $.ajax({
        url:'insert_assessment_of_next_step.php',
        type:"POST",
        // datatype:"json",
        data:{
          main_radio_score_id:main_radio_score_id,
          array_comment:array_comment,
          eva_id:eva_id
        }
        })
        path.done(function(data){
        console.log('data=====>',data);
        if(data==0){
        Swal.fire({
          type: 'error',
          title: 'ไม่สำเร็จ',
          text: 'กรุณาติดต่อเจ้าหน้าที่'
        });
      }
      else {
        var ok = Swal.fire({
          type: 'success',
          title: 'สำเร็จ',
          text: 'OK'
        })
        ok.then(function(value) {
          // var icon_menu="class='fa fa-check-square-o color:red'";
          // localStorage.setItem("icon_check_menu_evaluation",icon_menu);//เก็บค่าเริ่มต้น
          // window.location.href ='../personnel/menu_evaluation.php'
        });
      }
      })
    }//end if
    // }
  })
});
function check_empty_times() {
  if (evaluation[title_number].eva_times!=0 && evaluation[title_number].eva_times!=''){
    var btn_times = "<input type='button' id='times' name='button' value='เริ่มการจับเวลา'>";
    $('.click_times').show(btn_times);
    $('.click_times').html(btn_times);
  }
  else{
    $('.show_times').hide();
    $('.click_times').html('');
  }
  $('#times').click(function() {
    var btn_times = "<input type='button' id='stop_times' class='stop_times' name='button' value='หยุดเวลา'>"
    $('.click_times').html(btn_times)
    status_times = 'start';
    $.ajax({
      url:'test.php',
      type:"POST",
      data:{
        eva_times:evaluation[title_number].eva_times,
        status_times:status_times
      }
    }).done(function(data){
      $(".show_times").show()
      $(".show_times").html(data)
      console.log(data);
    });
    $("#stop_times").click(function() {
      status_times = 'stop';
      $.ajax({
        url:'test.php',
        type:"POST",
        data:{
          eva_times:evaluation[title_number].eva_times,
          status_times:status_times
        }
      }).done(function(data){
          check_empty_times();
      });
    });
  });
}

title_number = 0
hos_cat_id_goball = ''
var hos_id_naja = ''
var goball_hos = ''
var data_patient = ''
var bool_insert = true //เก็บค่า true เพื่อinsert
var eva_id = {}
var data_list_score ={}
var main_radio_score_id = {}
var textarea =''
var show_list_radio = []
var list_radio = ''
var score = ''
var count_data_eva =0
var main_radio_score =''
var btn_main_radio = 0
var evaluation = ''
var page = 0;
var data_next_step = []
var number = 1;
var row_radio = ''
var check_point = 1;
var count_readio = 1;
var title_id = 1;
var title_id_Previous = 0
var count_parameter = 1;//count_parameter = ข้อ score = คะแนน
var array_score =[];
var array_check_main_radio = {}
var array_check = {}
var array_comment = {}
var key_radio = 1
var check1 = 0
var check_readio_score = ''
var id_radio =[]
var index_id_radio = 1
var return_data = []
var name_main_radio = ''
var title_id_main = 1
var status_times = ''
var hospital_goball = ''
$(document).on("click","input[id=next]",function(){
  console.log("array_check:::::",array_check);
  console.log("main_radio_score_id[title_number]========asda>",main_radio_score_id[title_number]);
  $('.show_number').html('<b>'+(title_number+2)+'</b>'+'/'+localStorage.getItem("count_data_eva"))
  console.log('next======>',array_check);
  array_comment[title_number]  = (array_check_main_radio[title_number]!='')? $('#detail_score_zero').val() : '' //เก็บค่า value ของข้อนั้นๆ โดยทำการ check ก่อน ว่าได้เลือกหัวข้อมั้ย
  console.log('comment===>',array_comment);
  $('input[type="radio"]').prop('checked',false); // set ปุ่ม radio ไม่ให้ติ๊ก
  $( ".show_eva_score" ).html(''); // set เป็น ค่า ว่าง ในการ show
  data_next_step // ค่าที่ได้จาก ยิง ajax
  eva_id[title_number] = evaluation[title_number].eva_id; //ให้ค่า หัวข้อการประเมิน
  title_number++ // เพิ่มค่า เพื่อเป็น ลำดับ index
  check_empty_times() //เรียกใช้ function เพื่อ ดูว่าคะแนนเป็น ค่าว่าง หรือ0 มั้ย
  console.log("evaluation====>",evaluation);
  console.log("jell====>",evaluation[title_number].eva_id);
  if(array_check_main_radio[title_number]!=''){
    $('input[value="'+array_check_main_radio[title_number]+'"]').prop('checked',true);
  }
  if (array_check_main_radio[title_number]==1){
    $( ".show_eva_score" ).html(show_list_radio[title_number]);
    $('input[id="'+array_check[title_number]+'"]').prop('checked',true);
  }else if (array_check_main_radio[title_number]=='X') {
    $(".show_eva_score").html(textarea)
    $('.detail_score_zero').val(array_comment[title_number])
  }
  if ((title_number+1)<=1){
    $('.show_previous').hide(); // ถ้า หัวข้อ น้อยกว่า 0 ให้ ซ่อนปุ่ม
  }else {
    $('.show_submit').hide();
    $('.show_next').show();
  }
  var count_data_eva = parseInt(localStorage.getItem("count_data_eva"))
  if ((title_number+1)<count_data_eva){ // ถ้าหัวข้อน้อยกว่า count_data_eva ที่ได้มาจากการนับ ใน database
    $('.show_previous').show()
  }else {
    $('.show_next').hide()
    $('.show_submit').show()
  }
  $(".show_evaluation").html((title_number+1)+' '+ evaluation[title_number].eva_name);
})
$(document).on("click","input[class=list_score]",function(){
  if ($(this).attr("class")=="list_score"){
    array_check[title_number] = $(this).attr("id")//radio ที่เลือก ครั้งที่ 2
    main_radio_score_id[title_number] = $(this).attr("id")
    // console.log("array_check[key_radio]::::",array_check);
  }
})
$(document).on("click","input[id=previous]",function(){
  array_comment[title_number]  = (array_check_main_radio[title_number]!='')? $('#detail_score_zero').val() : '' //เก็บค่า value ของข้อนั้นๆ โดยทำการ check ก่อน ว่าได้เลือกหัวข้อมั้ย
  $('.show_number').html((title_number)+'/'+count_data_eva) //แสดงหัวข้อ
  $('input[type="radio"]').prop('checked',false); // set ปุ่ม radio ไม่ให้ติ๊ก
  $( ".show_eva_score" ).html(''); // set เป็น ค่า ว่าง ในการ show
  eva_id[title_number] = evaluation[title_number].eva_id; //ให้ค่า หัวข้อการประเมิน
  data_next_step // ค่าที่ได้จาก ยิง ajax
  title_number-- // เพิ่มค่า เพื่อเป็น ลำดับ index
  check_empty_times()//เรียกใช้ function เพื่อ ดูว่าคะแนนเป็น ค่าว่าง หรือ0 มั้ย
    if(array_check_main_radio[title_number]!=''){
      $('input[value="'+array_check_main_radio[title_number]+'"]').prop('checked',true);
    }
    if (array_check_main_radio[title_number]==1){
      $( ".show_eva_score" ).html(show_list_radio[title_number]);
      $('input[id="'+array_check[title_number]+'"]').prop('checked',true);
    }else if (array_check_main_radio[title_number]=='X') {
      $(".show_eva_score").html(textarea)
      $('.detail_score_zero').val(array_comment[title_number])
    }
  if ((title_number+1)<=1){
    $('.show_previous').hide(); // ถ้า หัวข้อ น้อยกว่า 0 ให้ ซ่อนปุ่ม
  }else {
    $('.show_submit').hide();
    $('.show_next').show();
  }
  $(".show_evaluation").html((title_number+1)+' '+ evaluation[title_number].eva_name);
})
function get_hospital(goball_hos){
  // console.log('555555===>',goball_hos);
  var pathname = window.location.pathname; // Returns path only (/path/example.html)
  if (pathname=='/project_final_rain/personnel/New_patient.php'){
    if (goball_hos!='' || goball_hos!=null) {
      host_cat_id = goball_hos;
      console.log('host_cat_id===>',host_cat_id);
    }
    if($("#host_cat_id").val()!=''){
      host_cat_id = $("#host_cat_id").val();
    }
    else {
      host_cat_id = '1' //รหัสโรงพยาบาล
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
     hospital_goball = data
     console.log('data===>',data);
     $.each(data.data,function(key,value){
        console.log(value.hos_id);
       row += mRow(value.hos_id,value.hos_name); // ชื่อฟิลด์ ออกมาจาก ฐานข้อมูลโดยจะได้จากหน้า ที่ ปั้น array
       hos_id += value.hos_id;
     })
     show += "<select id='hos_id' name='hos_id'>"
     show += row
     show += "</select>"
     console.log('===>',hos_id_naja);
     $(".show_hospital").html(show)
     if (hos_id_naja!=''){
       $("option[value=" + hos_id_naja + "]").prop("selected",true);//โชว์  สถานะภาพ
     }
   });
  }
}
function detail_eva_description(){
  var warning = (evaluation[title_number].eva_note!='')?'<br><br>'+'<b>คำเตือน<b><br>'+evaluation[title_number].eva_note :'';
  Swal.fire(
    '<span style="color:#000000">รายละเอียด</span>',
    evaluation[title_number].eva_description +'<span style="color:#FF0000">'+warning+'</span>',
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
              window.location.href='personnel/New_patient.php';
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
        // window.location.href='personnel/menu_personnel.php';
        window.location.href='personnel/New_patient.php';
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
  var path = $.ajax({
  url:'../next_step/query_data_next_step.php',
  type:"POST",
  datatype:"json",
  data:{id:ass_cat_id}
  });
  path.done(function(data){
    var data = JSON.parse(data);
    data_next_step = data //data_next_step คือ ค่า goble
    // console.log("====>",data_next_step.evaluation[0]);
    localStorage.setItem("data_next_step",JSON.stringify(data_next_step));
    localStorage.setItem("main_radio_score",JSON.stringify(data_next_step.main_radio_score));
    localStorage.setItem("main_radio_true",JSON.stringify(data_next_step.main_radio_true));
    localStorage.setItem("count_data_eva",data_next_step.count_data_eva); //มีทั้งหมดกี่หัวข้อ
    localStorage.setItem("title_number",number);//เก็บค่าเริ่มต้น
    localStorage.setItem("data_list_score",JSON.stringify(data_next_step.list_score));
    localStorage.setItem("data_eva", JSON.stringify(data_next_step.evaluation));//ข้อมูลเนื้อหา
    localStorage.setItem("main_radio_true",JSON.stringify(data_next_step.main_radio_true));//main_radio_true
    localStorage.setItem("size_radio_main",JSON.stringify(data_next_step.size_radio_main));//size radio
    localStorage.setItem("main_radio_score_id",JSON.stringify(data_next_step.main_radio_score_id));//id main radio
    console.log(data);
// Retrieve
  })
  window.location.href="../next_step/index.php";
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
  sum += parseFloat(id.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id.charAt(12)) )
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
      else if (data==200) {
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
function age(dob, today) {
    var today = today || new Date(),
        result = {
          years: 0,
          months: 0,
          days: 0,
          toString: function() {
            return (this.years ? this.years + ' ปี ' : '')
              + (this.months ? this.months + ' เดือน ' : '')
              + (this.days ? this.days + ' วัน' : '');
          }
        };
    result.months =
      ((today.getFullYear() * 12) + (today.getMonth() + 1))
      - ((dob.getFullYear() * 12) + (dob.getMonth() + 1));
    if (0 > (result.days = today.getDate() - dob.getDate())) {
        var y = today.getFullYear(), m = today.getMonth();
        m = (--m < 0) ? 11 : m;
        result.days +=
          [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][m]
            + (((1 == m) && ((y % 4) == 0) && (((y % 100) > 0) || ((y % 400) == 0)))
                ? 1 : 0);
        --result.months;
    }
    result.years = (result.months - (result.months % 12)) / 12;
    result.months = (result.months % 12);
    return result;
}
