<?
@session_start();
require_once('includeteacher/connect.php');
if(!isset($_SESSION['teacher_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:/login.php");
}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ค้นหาสถานที่ &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
  <body class="hold-transition skin-purple sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <?php include('includeteacher/headerteacher.php'); ?>
    </header>
    <aside class="main-sidebar">
      <?php include('includeteacher/sidebarteacher.php'); ?>
    </aside>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          ค้นหาตำแหน่ง
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="teacherindex.php"><i class="fa fa-dashboard"></i>Home</a>
          <li class="active"><i class="fa fa-map-marker"></i></li> ค้นหาตำแหน่ง
        </ol>
      </section>
        <section class="content">
        <div class="box box-Gray">
        <div class="box-header with-border">
        <h3 class="box-title">ค้นหาเส้นทางในการไปนิเทศจากนักศึกษาปักหมุด</h3>
        </div>
        <div class="box-body">
        <div class="row">
        <div class="col-md-12">
        <div class="form-group">
        <center><form id="form_search_map_data" name="form_search_map_data" method="post" action="" class="navbar-form" role="search" onsubmit="return false;">
        <div class="form-group  is-empty">
        <input type="text" name="data_search" id="data_search" class="form-control" placeholder="กรุณากรอกรหัสนักศึกษา">
        <button type="submit" name="bt_search" id="bt_search" class="btn btn-success btn-round btn-just-icon" value="Search" onclick="search_map();">
        <i class="fa fa-search"> ค้นหา</i>
        </button>
        </div>
        </form></center>

        <div id="map_canvas" class="card-content" style="width:100%;height:65vh"></div>

        <form class="form-horizontal" method="post" action="" >
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">From :</label>
              <div class="col-sm-10">
                <input name="namePlaceGet"  type="text" id="namePlaceGet" class="form-control" placeholder="จาก" disabled/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">To :</label>
              <div class="col-sm-10">
                <input name="toPlaceGet" type="text" id="toPlaceGet" class="form-control" placeholder="ถึง" disabled/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">ระยะทาง :</label>
              <div class="col-sm-10">
                <input name="distance_text" type="text" id="distance_text" class="form-control" placeholder="แสดงระยะทาง" disabled/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">ระยะเวลาที่ถึง :</label>
              <div class="col-sm-10">
                <input name="duration_text" type="text" id="duration_text" class="form-control" placeholder="แสดงระยะเวลาที่ถึง" disabled/>
              </div>
            </div>
            <p id="myconsole"></p>
        </div>
        </form>

        </div>
        </div>
        </div>
       </div>
      </section>
    </div>
    </section>
  </div>
</div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();
    });
</script>
<script src="//unpkg.com/jquery@3.2.1"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
var directionShow; // กำหนดตัวแปรสำหรับใช้งาน กับการสร้างเส้นทาง
var directionsService; // กำหนดตัวแปรสำหรับไว้เรียกใช้ข้อมูลเกี่ยวกับเส้นทาง
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
var my_Latlng; // กำหนดตัวแปรสำหรับเก็บจุดเริ่มต้นของเส้นทางเมื่อโหลดครั้งแรก
var initialTo; // กำหนดตัวแปรสำหรับเก็บจุดปลายทาง เมื่อโหลดครั้งแรก
var searchRoute; // กำหนดตัวแปร ไว้เก็บฃื่อฟังก์ชั้น ให้สามารถใช้งานจากส่วนอื่นๆ ได้
function initialize() { // ฟังก์ชันแสดงแผนที่


  GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
  service = new GGM.DistanceMatrixService();
  directionShow=new  GGM.DirectionsRenderer({draggable:true});
  directionsService = new GGM.DirectionsService();

//  my_Latlng  = new GGM.LatLng(14.1592123,101.3472844);
  // กำหนดตำแหน่งปลายทาง สำหรับการโหลดครั้งแรก
  initialTo=new GGM.LatLng(14.1592123,101.3472844);
  var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
  // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
  var my_DivObj=$("#map_canvas")[0];
  // กำหนด Option ของแผนที่
  var myOptions = {
      zoom: 13, // กำหนดขนาดการ zoom
      center: my_Latlng , // กำหนดจุดกึ่งกลาง จากตัวแปร my_Latlng
      mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่ จากตัวแปร my_mapTypeId
  };

map = new GGM.Map(my_DivObj,myOptions); // สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map

if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(function(position){
            var pos = new GGM.LatLng(position.coords.latitude,position.coords.longitude);

            var infowindow = new GGM.InfoWindow({
                map:map,
                position: pos,
                content: "คุณอยู่ที่นี่."

            });

            var my_Point = infowindow.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
                           map.panTo(my_Point);  // ให้แผนที่แสดงไปที่ตัว marker
                           //$("#lat_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
                           //$("#lon_value").val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value
                           $("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value
                           map.setCenter(pos);

           my_Latlng  = new GGM.LatLng(my_Point.lat(),my_Point.lng());


        },function() {
            // คำสั่งทำงาน ถ้า ระบบระบุตำแหน่ง geolocation ผิดพลาด หรือไม่ทำงาน
        });
}else{
     // คำสั่งทำงาน ถ้า บราวเซอร์ ไม่สนับสนุน ระบุตำแหน่ง
}







  directionShow.setMap(map); // กำหนดว่า จะให้มีการสร้างเส้นทางในแผนที่ที่ชื่อ map

  if(map){ // เงื่่อนไขถ้ามีการสร้างแผนที่แล้ว
       searchRoute(my_Latlng,initialTo); // ให้เรียกใช้ฟังก์ชัน สร้างเส้นทาง
  }

  // กำหนด event ให้กับเส้นทาง กรณีเมื่อมีการเปลี่ยนแปลง
  GGM.event.addListener(directionShow, 'directions_changed', function() {
      var results=directionShow.directions; // เรียกใช้งานข้อมูลเส้นทางใหม่
      // นำข้อมูลต่างๆ มาเก็บในตัวแปรไว้ใช้งาน
      var addressStart=results.routes[0].legs[0].start_address; // สถานที่เริ่มต้น
      var addressEnd=results.routes[0].legs[0].end_address;// สถานที่ปลายทาง
      var distanceText=results.routes[0].legs[0].distance.value; // ระยะทางข้อความ
      var distanceVal=results.routes[0].legs[0].distance.value;// ระยะทางตัวเลข
      var durationText=results.routes[0].legs[0].duration.text; // ระยะเวลาข้อความ
      var durationVal=results.routes[0].legs[0].duration.value; // ระยะเวลาตัวเลข
      // นำค่าจากตัวแปรไปแสดงใน textbox ที่ต้องการ
      $("#namePlaceGet").val(addressStart);
      $("#toPlaceGet").val(addressEnd);
      $("#distance_text").val(distanceText);
      $("#distance_value").val(distanceVal);
      $("#duration_text").val(durationText);
      $("#duration_value").val(durationVal);
  });





}



$(function(){
    $("#data_search").keyup(function(e){
        if(e.keyCode==13){ // เมื่อกดปุ่ม enter ในช่องค้นหา
            search_map(); // ให้เรียกใช้ฟังก์ชั่นการค้นหา แบบ ajax
        }
    });
});

function search_map(){ // ฟังก์ชั่นการค้นหา แบบ ajax

    $.ajax({
        url:"genMarker.php", // ใช้ ajax ใน jQuery เรียกใช้ไฟล์ xml
        type: "GET", // ส่งค่าข้อมูลแบบ POST ไปที่ไฟล์ genMarker.php
        data: { data_search :$("#data_search").val()}, //// รับค่า จากการ input text ชื่อ id เท่ากับ data_search
        dataType: "xml",
        success:function(xml){
            $(xml).find('marker').each(function(){ // วนลูปดึงค่าข้อมูลมาสร้าง marker

                    var markerID=$(this).attr("id");// นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน
                    var markerName=$(this).find("name").text(); // นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน
                    var markerLat=$(this).find("latitude").text(); // นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน
                    var markerLng=$(this).find("longitude").text(); // นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน
                    var markerLatLng=new GGM.LatLng(markerLat,markerLng);

                    var FromPlace="14.1592123,101.3472844";// รับค่าชื่อสถานที่เริ่มต้น
                    var ToPlace = new GGM.LatLng(markerLat,markerLng);
                    //  ToPlace.push(ToPlace);




                    var request={
                        origin:my_Latlng, // สถานที่เริ่มต้น
                        destination:ToPlace, // สถานที่ปลายทาง
                        travelMode: GGM.DirectionsTravelMode.DRIVING // กรณีการเดินทางโดยรถยนต์
                    };

                    directionsService.route(request, function(results, status){
                        if(status==GGM.DirectionsStatus.OK){ // ถ้าสามารถค้นหา และสร้างเส้นทางได้
                            directionShow.setDirections(results); // สร้างเส้นทางจากผลลัพธ์
                            // นำข้อมูลต่างๆ มาเก็บในตัวแปรไว้ใช้งาน
                            var addressStart=results.routes[0].legs[0].start_address; // สถานที่เริ่มต้น
                            var addressEnd=results.routes[0].legs[0].end_address;// สถานที่ปลายทาง
                            var distanceText=results.routes[0].legs[0].distance.text; // ระยะทางข้อความ
                            var distanceVal=results.routes[0].legs[0].distance.value;// ระยะทางตัวเลข
                            var durationText=results.routes[0].legs[0].duration.text; // ระยะเวลาข้อความ
                            var durationVal=results.routes[0].legs[0].duration.value; // ระยะเวลาตัวเลข
                            // นำค่าจากตัวแปรไปแสดงใน textbox ที่ต้องการ
                            $("#namePlaceGet").val(addressStart);
                            $("#toPlaceGet").val(addressEnd);
                            $("#distance_text").val(distanceText);
                            $("#distance_value").val(distanceVal);
                            $("#duration_text").val(durationText);
                            $("#duration_value").val(durationVal);
                            // ส่วนการกำหนดค่านี้ จะกำหนดไว้ที่ event direction changed ที่เดียวเลย ก็ได้
                        }else{
                          alert("ไม่พบข้อมูล ตามค้นหา");
                        }

                    });
            });
        }
    });
}




/*$(function(){
    // ส่วนของฟังก์ชัน สำหรับการสร้างเส้นทาง
    searchRoute=function(FromPlace,ToPlace){ // ฟังก์ชัน สำหรับการสร้างเส้นทาง

              // ถ้าไม่ได้ส่งค่าเริ่มต้นมา ให้ใฃ้ค่าจากการค้นหา
              if(!FromPlace && !ToPlace){

              $.ajax({
                  url:"genMarker.php", // ใช้ ajax ใน jQuery เรียกใช้ไฟล์ xml
                  type: "GET", // ส่งค่าข้อมูลแบบ POST ไปที่ไฟล์ genMarker.php
                  data: { data_search :$("#toPlace").val()}, //// รับค่า จากการ input text ชื่อ id เท่ากับ data_search
                  dataType: "xml",
                  success:function(xml){
                    $(xml).find('marker').each(function(){

                    var markerID=$(this).attr("id");// นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน
                    var markerName=$(this).find("name").text(); // นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน
                    var markerLat=$(this).find("latitude").text(); // นำค่าต่างๆ มาเก็บไว้ในตัวแปรไว้ใช้งาน
                    var markerLng=$(this).find("longitude").text();

                    var FromPlace="14.1592123,101.3472844";// รับค่าชื่อสถานที่เริ่มต้น
                    var ToPlace = new GGM.LatLng(markerLat,markerLng);



                     });


                         }


                   });


                 }


                   var request={
                       origin:FromPlace, // สถานที่เริ่มต้น
                       destination:ToPlace, // สถานที่ปลายทาง
                       travelMode: GGM.DirectionsTravelMode.DRIVING // กรณีการเดินทางโดยรถยนต์
                   };


                  //if(!FromPlace && !ToPlace){
                   //var FromPlace="14.1592123,101.3472844";// รับค่าชื่อสถานที่เริ่มต้น
                   //var   ToPlace = new GGM.LatLng(markerLat,markerLng);
                  // destinations.push(posPlace);
                  //   }
                  //var ToPlace=$("#toPlace").val(); // รับค่าชื่อสถานที่ปลายทาง





        // กำหนด option สำหรับส่งค่าไปให้ google ค้นหาข้อมูล


        // ส่งคำร้องขอ จะคืนค่ามาเป็นสถานะ และผลลัพธ์
        directionsService.route(request, function(results, status){
            if(status==GGM.DirectionsStatus.OK){ // ถ้าสามารถค้นหา และสร้างเส้นทางได้
                directionShow.setDirections(results); // สร้างเส้นทางจากผลลัพธ์
                // นำข้อมูลต่างๆ มาเก็บในตัวแปรไว้ใช้งาน
                var addressStart=results.routes[0].legs[0].start_address; // สถานที่เริ่มต้น
                var addressEnd=results.routes[0].legs[0].end_address;// สถานที่ปลายทาง
                var distanceText=results.routes[0].legs[0].distance.text; // ระยะทางข้อความ
                var distanceVal=results.routes[0].legs[0].distance.value;// ระยะทางตัวเลข
                var durationText=results.routes[0].legs[0].duration.text; // ระยะเวลาข้อความ
                var durationVal=results.routes[0].legs[0].duration.value; // ระยะเวลาตัวเลข
                // นำค่าจากตัวแปรไปแสดงใน textbox ที่ต้องการ
                $("#namePlaceGet").val(addressStart);
                $("#toPlaceGet").val(addressEnd);
                $("#distance_text").val(distanceText);
                $("#distance_value").val(distanceVal);
                $("#duration_text").val(durationText);
                $("#duration_value").val(durationVal);
                // ส่วนการกำหนดค่านี้ จะกำหนดไว้ที่ event direction changed ที่เดียวเลย ก็ได้
            }else{
                // กรณีไม่พบเส้นทาง หรือไม่สามารถสร้างเส้นทางได้
                // โค้ดตามต้องการ ในทีนี้ ปล่อยว่าง
            }


        });






}



    // ส่วนควบคุมปุ่มคำสั่งใช้งานฟังก์ชัน
    $("#SearchPlace").click(function(){ // เมื่อคลิกที่ปุ่ม id=SearchPlace
        searchRoute();  // เรียกใช้งานฟังก์ชัน ค้นหาเส้นทาง
    });

    $("#namePlace,#toPlace").keyup(function(event){ // เมื่อพิมพ์คำค้นหาในกล่องค้นหา
        if(event.keyCode==13 && $(this).val()!=""){ //  ตรวจสอบปุ่มถ้ากด ถ้าเป็นปุ่ม Enter
            searchRoute();      // เรียกใช้งานฟังก์ชัน ค้นหาเส้นทาง
        }
    });

    $("#iClear").click(function(){
        $("#namePlace,#toPlace").val(""); // ล้างค่าข้อมูล สำหรับพิมพ์คำค้นหาใหม่
    });




});*/


$(function(){
    // โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว
    // ค่าตัวแปร ที่ส่งไปในไฟล์ google map api
    // v=3.2&sensor=false&language=th&callback=initialize
    //  v เวอร์ชัน่ 3.2
    //  sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false
    //  language ภาษา th ,en เป็นต้น
    //  callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize
    $("<script/>", {
      "type": "text/javascript",
      src: "//maps.google.com/maps/api/js?v=3.2&key=AIzaSyBYJkbuNozBMBqN0CaqJJEwxRYbkdi-BnE&sensor=false&language=th&callback=initialize"



    }).appendTo("body");
});

</script>
