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

<html lang="en">
<head>
</head>
<body>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">ปักหมุดสถานประกอบการ</h4>
  </div>
  <div class="modal-body">
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" id="form" name="form" method="POST" action=" ">
          <div class="box-body">
            <div class="col-lg-12 col-md-12">
             <div id="map_canvas" class="card-content" style="width:100%;height:50vh">
           </div>
           <br>
            <form>
              <div class="form-group">
                           <label>รหัสนักศึกษา</label>
                           <select class="form-control" name="student_code" id="student_code" disabled>
                             <? $b = "SELECT * FROM student where student_code = $r" ;
                             $query1 = mysqli_query($conn,$b);
                             while ($b = mysqli_fetch_array($query1)) {?>
                               <option value="<? echo $b[0]; ?>"><? echo $b[0]." ".$b[1]." ".$b[2];?></option>
                             <? } ?>
                           </select>
                         </div>
                <div class="form-group">
                    <label>ละติจูต</label>
                    <input type="text" class="form-control" id="location_x" >
                </div>
                <div class="form-group">
                  <label>ลองติจูต</label>
                  <input type="text" class="form-control" id="location_y" >
                </div>
                <button type="button" onclick="saveLocation()" class="btn btn-success">ยืนยันข้อมูล</button>
                <button class="btn btn-warning btn-round" data-dismiss="modal">ยกเลิก</button>
                </form>
               </div>
             </div>
         </div>
        </form>
      </div>
<? mysqli_close($conn); ?>
</body>
</html>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOXYqDbe1mwMH0i3ig-QvHeUOsL6f9JIU&callback=initMap"
type="text/javascript"></script>

<script language="JavaScript">
function initMap() {
  GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
  // กำหนดจุดเริ่มต้นของแผนที่
    var my_Latlng  = new GGM.LatLng(13.761728449950002,100.6527900695800);
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
