<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Google Map API 3 - 01</title>
<style type="text/css">
html { height: 100% }
body {
    height:100%;
    margin:0;padding:0;
    font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;
    font-size:12px;
}
/* css กำหนดความกว้าง ความสูงของแผนที่ */
#map_canvas {
    width:550px;
    height:400px;
    margin:auto;
    margin-top:50px;
}
</style>


</head>

<body>
  <div id="map_canvas"></div>
 <div id="showDD" style="margin:auto;padding-top:5px;width:550px;">
<!--textbox กรอกชื่อสถานที่ และปุ่มสำหรับการค้นหา เอาไว้นอกแท็ก <form>-->


  <hr />
<!--  <form> เก็บข้อมูลสำหรับนำไปบันทึกลงฐานข้อมูล หรือนำไปใช้อื่นๆ-->
<form id="form_get_detailMap" name="form_get_detailMap" method="post" action="" onsubmit="return false;">

  <input type="text" name="data_search" id="data_search" value="" style="width:300px;" />
  <input type="button" name="bt_search" id="bt_search" value="Search" onclick="search_map();" />
  <br>

<?php
$data_search = $_POST['data_search'];

$conn = mysqli_connect("localhost","mayz","sB0k55NO","mayz_messs");

  $q="SELECT * FROM location WHERE '5806021420164' LIKE`student_code` ORDER BY student_code desc limit 1";
  $query1 = mysqli_query($conn,$q);
  $rs = mysqli_fetch_row($query1);

//echo "string";
    ?>



<a href="https://www.google.com/maps/dir//<?php echo $rs[1]; ?>,<?php echo $rs[2]; ?>">นำทาง</a>





  <br>
  <br>
From:
<input name="namePlaceGet" type="text" id="namePlaceGet" size="60" />
<br />
To:
<input name="toPlaceGet" type="text" id="toPlaceGet" size="60" /><br />
ระยะทางข้อความ
<input name="distance_text" type="text" id="distance_text" value="" size="17" />
ระยะทางตัวเลข
<input name="distance_value" type="text" id="distance_value" value="0" size="17" />
เมตร<br />
ระยะเวลาข้อความ
<input name="duration_text" type="text" id="duration_text" size="15" />
ระยะเวลาตัวเลข
<input name="duration_value" type="text" id="duration_value" value="0" size="17" />
วินาที
<input type="submit" name="button" id="button" value="บันทึก" />
  <br />
  * ระยะทางโดยประมาณ ระยะเวลา กรณีขับรถ โดยประมาณ
  <p id="myconsole"></p>
</form>
</div>
<?
$test = $_POST['distance_text'];
echo $test;
?>
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
    // กำหนดจุดเริ่มต้นของแผนที่
    my_Latlng  = new GGM.LatLng(14.1592123,101.3472844);
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
//          console.log(xml);
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
                        origin:FromPlace, // สถานที่เริ่มต้น
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
                            // กรณีไม่พบเส้นทาง หรือไม่สามารถสร้างเส้นทางได้
                            // โค้ดตามต้องการ ในทีนี้ ปล่อยว่าง
                        }

                    });
            });

            if(data_found==0){ // ถ้าไม่พบข้อมูลใดๆ ให้แสดงเตือน
                alert("ไม่พบข้อมูล ตามค้นหา");
                $("#data_search").val("");
            }
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
      src: "//maps.google.com/maps/api/js?v=3.2&key=AIzaSyDrLP1L6JIe1HTeANOx8UV5n31NytuHWnw&sensor=false&language=th&callback=initialize"



    }).appendTo("body");
});

</script>
</body>
</html>
