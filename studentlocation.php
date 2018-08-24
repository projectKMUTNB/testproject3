<html lang="en">
<head>
    <meta charset="utf-8" />
    <!--<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>หน้าปักหมุดเพื่อระบุตำแหน่ง &mdash; ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>
<body>
  <?
  @session_start();
  require_once('includestudent/connect.php');

  if(!isset($_SESSION['student_code']))
  header("location:login.php");
  if(isset($_GET['logout'])){
    session_destroy();
    header("location:login.php");
  }
  $r = $_SESSION['student_code'];
  ?>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-1.jpg">
          <? include('includestudent/sidebarstudent.php'); ?>
        </div>
        <div class="main-panel">
          <? include('includestudent/headerstudent.php'); ?>
            <div class="content">

                    <div class="row">
                      <div class="col-lg-12 col-md-12">
                  <div class="card">
                      <div class="card-header" data-background-color="green">
                          <h4 class="title">ปักหมุดเพื่อระบุตำแหน่งที่ฝึกงาน</h4>
                          <p class="category">โปรดระบุพิกัดสถาณประกอบการ</p>
                      </div>
                     <div class="col-lg-12 col-md-12">

                      <div id="map_canvas" class="card-content" style="width:100%;height:50vh">
                    </div>
                   <div class="col-lg-12 col-md-12">
                     <form>
                       <div class="form-group">
                                    <label>รหัสนักศึกษา</label>
                                    <select class="form-control" name="student_code" id="student_code">
                                      <? $b = "SELECT * FROM student where student_code = $r" ;
                                      $query1 = mysqli_query($conn,$b);
                                      while ($b = mysqli_fetch_array($query1)) {?>
                                        <option value="<? echo $b[0]; ?>"><? echo $b[0]." ".$b[1]." ".$b[2];?></option>
                                      <? } ?>
                                    </select>
                                  </div>
                         <div class="form-group">

                         <div class="form-group">
                             <label for="lat">Lat</label>
                             <input type="text" class="form-control" id="location_x" >
                         </div>
                         <div class="form-group">
                           <label for="Lng">Lng</label>
                           <input type="text" class="form-control" id="location_y" >
                         </div>
                         <button type="button" onclick="saveLocation()" class="btn btn-success">ยืนยันข้อมูล</button>
                         <button class="btn btn-danger btn-round" data-dismiss="modal">ยกเลิก</button>
                         </form>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();
    });
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOXYqDbe1mwMH0i3ig-QvHeUOsL6f9JIU&callback=initMap"
type="text/javascript"></script>

<script language="JavaScript">
function initMap() {
  GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
  // กำหนดจุดเริ่มต้นของแผนที่
//  var my_Latlng  = new GGM.LatLng(13.761728449950002,100.6527900695800);
  var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
  // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
  var my_DivObj=$("#map_canvas")[0];
  // กำหนด Option ของแผนที่
  var myOptions = {
      zoom: 13, // กำหนดขนาดการ zoom
      center: my_Latlng , // กำหนดจุดกึ่งกลาง
      mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่
  };
  map = new GGM.Map(my_DivObj,myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map


  if(navigator.geolocation){
          navigator.geolocation.getCurrentPosition(function(position){
              var pos = new GGM.LatLng(position.coords.latitude,position.coords.longitude);
              var infowindow = new GGM.InfoWindow({
                  map: map,
                  position: pos,
                  content: "คุณอยู่ที่นี่."

              });

              var my_Point = infowindow.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
              map.panTo(my_Point);  // ให้แผนที่แสดงไปที่ตัว marker
              map.setCenter(pos);
              $("#location_x").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
              $("#location_y").val(my_Point.lng());


                var marker = new  google.maps.Marker({
                      map:map,
                      position:pos,
                      animation: google.maps.Animation.DROP,
                      draggalbe:true

                    });

                          google.maps.event.addListener(map,'click',function(event){
                            infowindow.open(map,marker);
                            infowindow.setContent("LatLng = " + event.latLng);
                            infowindow.setPosition(event.latLng);
                            marker.setPosition(event.latLng);

                            $("#location_x").val(event.latLng.lat());
                            $("#location_y").val(event.latLng.lng());


                          });






          },function() {
              // คำสั่งทำงาน ถ้า ระบบระบุตำแหน่ง geolocation ผิดพลาด หรือไม่ทำงาน
          });
  }else{
       // คำสั่งทำงาน ถ้า บราวเซอร์ ไม่สนับสนุน ระบุตำแหน่ง
  }




}
function saveLocation(){
var student_code  = $("#student_code").val();
var location_x  = $("#location_x").val();
var location_y  = $("#location_y").val();


$.ajax({
method:"POST",
url:"insertstd.php",
data:{ student_code:student_code,location_x:location_x,location_y:location_y   }
}).done(function(text){
alert("บันทึกข้อมูลเสร็จสิ้น");
});

}
</script>
</html>
