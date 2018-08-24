<?php
   @session_start();
	  require_once('includeteacher/connect.php');

	  if(!isset($_SESSION['teacher_code']))
	  header("location:login.php");
	  if(isset($_GET['logout'])){
	    session_destroy();
	    header("location:login.php");
	  }
$tc= $_SESSION['teacher_code'];
$Max = $_POST['Max'];
$sc = $_POST['Sc'];
$commentstu_detail = $_POST['commentstu_detail'];

$query = "INSERT INTO commentstudent values (' ',
'$commentstu_detail',
'$sc',
'$tc')";
$result = mysqli_query($conn,$query);

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


// ค่าน้ำหนักก

/*$we = array();
$query = mysqli_query($conn,"SELECT * FROM weightrecord");
while($row = mysqli_fetch_array($query)){
  $we[] = $row[0];
  echo $row[0];
}*/
//

// บันทึกคะแนนลงฐานข้อมูล  ***
foreach($Choice as $val):
    if(is_array($val)):
        foreach($val as $v):
            $insert="INSERT into trecodestudentevaluation VALUES ('".$v."','$sc','$tc');";
            $sql=mysqli_query($conn,$insert);
        endforeach;
    else:
        $insert="INSERT into trecodestudentevaluation VALUES ('".$val."','$sc','$tc');";
        $sql=mysqli_query($conn,$insert);
    endif;
endforeach;
//-----------------------------------------------------------------

if($sql&&$result){
  echo "<script>alert(\"ทำการบันทึกแบบประเมินนักศึกษาแล้ว\");</script>";
  echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"0; URL=selectstudent.php\">";
  }else{
  echo "<script>alert(";
  echo "บันทึกข้อมูลล้มเหลว(\"mysqli_error($conn)\")";
  echo ")</script>";
  }
mysqli_close($conn);
?>
