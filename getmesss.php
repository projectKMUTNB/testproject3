<?php
   @session_start();
	  require_once('includestudent/connect.php');


	  if(!isset($_SESSION['teacher_code']))
	  header("location:login.php");
	  if(isset($_GET['logout'])){
	    session_destroy();
	    header("location:login.php");
	  }
    $con = mysqli_connect("localhost","root","12345678","messs");
$tc= $_SESSION['teacher_code'];
$Max = $_POST['Max'];
$sc = $_POST['Sc'];
$total=array();


// รับค่าตัวเลือกมาเก็บใน Array
$Choice = array();
for ($i=1; $i <= $Max; $i++) {
		array_push($Choice,$_POST['radio_'.$i]);
}


// * ค่าน้ำหนัก
for ($k=0; $k <= $Max-1; $k++) {
	$total[]=$we[$k]*$Choice[$k];
}
//*****





// ดึงค่าน้ำหนักก เก็บ array

$we = array();
$query = mysqli_query($con,"SELECT * FROM weighttest");
while($row = mysqli_fetch_array($query)){
  $we[] = $row[0];
  echo $row[0];
}
//



// บันทึกคะแนนลงฐานข้อมูล  ***
foreach($Choice as $val):
    if(is_array($val)):
        foreach($val as $v):
            $insert="INSERT into insertdstd VALUES ('".$v."','$sc','$tc');";
            $sql=mysqli_query($con,$insert);
        endforeach;
    else:
        $insert="INSERT into insertdstd VALUES ('".$val."','$sc','$tc');";
        $sql=mysqli_query($con,$insert);
    endif;
endforeach;
//-----------------------------------------------------------------

echo "<pre>";
print_r($Choice);
echo "</pre>";
echo array_sum($Choice);
?>
<br>
<?php

echo $sc;
print_r($total);
echo $row[0];
?>
