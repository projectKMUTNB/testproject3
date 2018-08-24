<?php
require_once('connect.php');
date_default_timezone_set("Asia/Bangkok");
$time=date("H.i");
$date=date("d M Y");
$temp = $_GET['temp'];
$query = "SELECT * FROM memberm where RFID = '$temp'" ;
$query = mysqli_query($conn,$query);
$b = mysqli_fetch_array($query);
if( mysqli_num_rows($query)>0)
{
$query1 = "INSERT INTO motorin values (' ','$b[1]','$time','$date','$b[9]','$b[10]')";
$result = mysqli_query($conn,$query1);
        if($result){?>
                <script>alert("OK")</script>
          <?
          $arr = [
              [
                  "ch1" => "1",
              ]
              ];
          echo json_encode($arr);
        }
        else {
?>
            <script>alert("เน่า")</script>
            <?
        }
}
else {
    ?>
    <script>alert("ไม่พบ")</script>
    <?
    $query1 = "INSERT INTO motorinfail values (' ','$temp','$time','$date')";
    $result = mysqli_query($conn,$query1);
    $arr = [
        [
            "ch1" => "0",
        ]
    ];
    echo json_encode($arr);

}
mysqli_close($conn);
?>
