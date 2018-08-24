<div class="sidebar-wrapper">
<ul class="nav">
  <li class="active">
    <a href="adminmanage.php">
    <i class="material-icons">dashboard</i>
    <p>หน้าหลัก</p>
    </a>
  </li>
  <li>
    <a href="appvoremanage.php">
      <i class="material-icons">notifications</i>
      <p>ยืนยันข้อมูล-Report
        <span class="notification text-danger">
          <?
          $a = "SELECT mrc_id from mainrecordcompany where approve_status = '2'";
          $query = mysqli_query($conn,$a);
          $count = mysqli_num_rows($query);
          $c1 = $count;
          $b = "SELECT crc_id from choicerecordcompany where approve_status = '2'";
          $query1 = mysqli_query($conn,$b);
          $count1 = mysqli_num_rows($query1);
          $c2 = $c1+$count1;
          $c = "SELECT mrs_id from mainrecordstudent where approve_status = '2'";
          $query2 = mysqli_query($conn,$c);
          $count2 = mysqli_num_rows($query2);
          $c3 = $c2+$count2;
          $d = "SELECT crs_id from choicerecordstudent where approve_status = '2'";
          $query3 = mysqli_query($conn,$d);
          $count3 = mysqli_num_rows($query3);
          $c4 = $c3+$count3;
          $e = "SELECT mrsc_id from mainrecordstucompany where approve_status = '2'";
          $query4 = mysqli_query($conn,$e);
          $count4 = mysqli_num_rows($query4);
          $c5 = $c4+$count4;
          $f = "SELECT crsc_id from choicerecordstucompany where approve_status = '2'";
          $query5 = mysqli_query($conn,$f);
          $count5 = mysqli_num_rows($query5);
          $c6 = $c5+$count5;
          $g = "SELECT mrcs_id from mainrecordcomstudent where approve_status = '2'";
          $query6 = mysqli_query($conn,$g);
          $count6 = mysqli_num_rows($query6);
          $c7 = $c6+$count6;
          $h = "SELECT crcs_id from choicerecordcomstudent where approve_status = '2'";
          $query7 = mysqli_query($conn,$h);
          $count7 = mysqli_num_rows($query7);
          $c8 = $c7+$count7;
          $i = "SELECT company_code from company where approve_status = '2'";
          $query8 = mysqli_query($conn,$i);
          $count8 = mysqli_num_rows($query8);
          $c9 = $c8+$count8;
          $j = "SELECT mentor_code from mentor where approve_status = '2'";
          $query9 = mysqli_query($conn,$j);
          $count9 = mysqli_num_rows($query9);
          $c10 = $c9+$count9;
          echo $c10;?></span>
      </p>
    </a>
  </li>
  <li>
    <a href="studentdata.php">
    <i class="material-icons">person</i>
    <p>จัดการข้อมูลนักศึกษา</p>
    </a>
  </li>
 <li>
    <a href="teacherdata.php">
    <i class="material-icons">school</i>
    <p>จัดการข้อมูลอาจารย์</p>
    </a>
  </li>
  <li>
    <a href="companydata.php">
    <i class="material-icons">work</i>
    <p>จัดการข้อมูลสถานประกอบการ</p>
    </a>
  </li>
  <li>
    <a href="mentordata.php">
    <i class="material-icons">supervisor_account</i>
    <p>จัดการข้อมูลพี่เลี้ยง</p>
    </a>
  </li>
   <li>
    <a href="mainrecordcompany.php">
    <i class="material-icons">note</i>
    <p>จัดการข้อมูลหัวข้ออาจารย์ประเมินสถานประกอบการ</p>
    </a>
  </li>
  <li>
   <a href="mainrecordstudent.php">
   <i class="material-icons">note</i>
   <p>จัดการข้อมูลหัวข้ออาจารย์ประเมินนักศึกษา</p>
   </a>
 </li>
 <li>
  <a href="mainrecordstucompany.php">
  <i class="material-icons">note</i>
  <p>จัดการข้อมูลหัวข้อนักศึกษาประเมินสถานประกอบการ</p>
  </a>
</li>
<li>
 <a href="mainrecordcomstudent.php">
 <i class="material-icons">note</i>
 <p>จัดการข้อมูลหัวข้อสถานประกอบการประเมินนักศึกษา</p>
 </a>
</li>
<li>
 <a href="commentstudentdata.php">
 <i class="material-icons">note</i>
 <p>จัดการข้อมูลความเห็นเพิ่มเติมในการนิเทศงานนักศึกษา</p>
 </a>
</li>
 <li>
  <a href="travelexpense.php">
  <i class="material-icons">directions_car</i>
  <p>จัดการข้อมูลค่าเดินทาง</p>
  </a>
</li>
</ul>
</div>
