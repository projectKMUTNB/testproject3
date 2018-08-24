<?
@session_start();
require_once('include/connect.php');
?>
<div class="sidebar-wrapper">
<ul class="nav">
  <li class="active">
    <a href="adminmanage.php">
    <i class="material-icons">dashboard</i>
    <p>หน้าหลัก</p>
    </a>
  </li>
   <li>
    <a href="appvoremainrecordcompany.php">
    <i class="material-icons">note</i>
    <p>ข้อมูลหัวข้ออาจารย์ประเมินสถานประกอบการ
    <span class="notification text-danger"><?
    $a = "SELECT mrc_id from mainrecordcompany where approve_status = '2'";
    $query = mysqli_query($conn,$a);
    $count = mysqli_num_rows($query);
    $c1 = $count;
    $b = "SELECT crc_id from choicerecordcompany where approve_status = '2'";
    $query1 = mysqli_query($conn,$b);
    $count1 = mysqli_num_rows($query1);
    $c2 = $c1+$count1;
    echo $c2;
    ?>
    </span>
    </p>
    </a>
  </li>
  <li>
   <a href="appvoremainrecordstudent.php">
   <i class="material-icons">note</i>
   <p>ข้อมูลหัวข้ออาจารย์ประเมินนักศึกษา
     <span class="notification text-danger"><?
     $c = "SELECT mrs_id from mainrecordstudent where approve_status = '2'";
     $query2 = mysqli_query($conn,$c);
     $count2 = mysqli_num_rows($query2);
     $c3 = $count2;
     $d = "SELECT crs_id from choicerecordstudent where approve_status = '2'";
     $query3 = mysqli_query($conn,$d);
     $count3 = mysqli_num_rows($query3);
     $c4 = $c3+$count3;
     echo $c4;
     ?>
     </span>
   </p>
   </a>
 </li>
 <li>
  <a href="appvoremainrecordstucompany.php">
  <i class="material-icons">note</i>
  <p>ข้อมูลหัวข้อนักศึกษาประเมินสถานประกอบการ
    <span class="notification text-danger"><?
    $g = "SELECT mrsc_id from mainrecordstucompany where approve_status = '2'";
    $query6 = mysqli_query($conn,$g);
    $count6 = mysqli_num_rows($query6);
    $c7 = $count6;
    $h = "SELECT crsc_id from choicerecordstucompany where approve_status = '2'";
    $query7 = mysqli_query($conn,$h);
    $count7 = mysqli_num_rows($query7);
    $c8 = $c7+$count7;
    echo $c8;
    ?>
    </span>
  </p>
  </a>
</li>
<li>
 <a href="appvoremainrecordcomstudent.php">
 <i class="material-icons">note</i>
 <p>ข้อมูลหัวข้อสถานประกอบการประเมินนักศึกษา
   <span class="notification text-danger"><?
   $e = "SELECT mrcs_id from mainrecordcomstudent where approve_status = '2'";
   $query4 = mysqli_query($conn,$e);
   $count4 = mysqli_num_rows($query4);
   $c5 = $count4;
   $f = "SELECT crcs_id from choicerecordcomstudent where approve_status = '2'";
   $query5 = mysqli_query($conn,$f);
   $count5 = mysqli_num_rows($query5);
   $c6 = $c5+$count5;
   echo $c6;
   ?>
   </span>
 </p>
 </a>
</li>
<li>
 <a href="appvorecompany.php">
 <i class="material-icons">note</i>
 <p>ข้อมูลสถานประกอบการ
   <span class="notification text-danger"><?
   $i = "SELECT company_code from company where approve_status = '2'";
   $query8 = mysqli_query($conn,$i);
   $count8 = mysqli_num_rows($query8);
   $c9 = $count8;
   echo $c9;
   ?>
   </span>
 </p>
 </a>
</li>
<li>
 <a href="appvorementor.php">
 <i class="material-icons">note</i>
 <p>ข้อมูลพี่เลี้ยง
   <span class="notification text-danger"><?
   $j = "SELECT mentor_code from mentor where approve_status = '2'";
   $query9 = mysqli_query($conn,$j);
   $count9 = mysqli_num_rows($query9);
   $c10 = $count9;
   echo $c10;
   ?>
   </span>
 </p>
 </a>
</li>
<li>
 <a href="Reportadmin.php">
 <i class="material-icons">note</i>
 <p>Report</p>
</a>
</li>
</ul>
</div>
