<?
@session_start();
require_once('connect.php');
if(!isset($_SESSION['username']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}
?>
<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--<a class="navbar-brand" href="adminmanage.php">ระบบประเมินผลและติดตามการนิเทศงานนักศึกษา</a>-->
        </div>
        <div class="collapse navbar-collapse">
           <ul class="nav navbar-nav navbar-right">
            <li>
                    <a href="adminmanage.php">
                        <i class="material-icons">dashboard</i>
                        <p class="hidden-lg hidden-md">Dashboard</p>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="appvoremanage.php">
                        <i class="material-icons">notifications</i>
                        <span class="notification">
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
                        <p class="hidden-lg hidden-md">ยืนยันข้อมูล</p>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="material-icons">person</i>
                    <? echo $_SESSION['username']; ?>
                    <p class="hidden-lg hidden-md"></p>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                          <a onclick="window.location.href='?logout'"><i class="material-icons">exit_to_app</i> ออกจากระบบ</a>
                      </li>
                    </ul>
                </li>
            <form class="navbar-form navbar-right" role="search">
                <!-- <div class="form-group  is-empty">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="material-input"></span>
                </div>
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                    <i class="material-icons">search</i>
                    <div class="ripple-container"></div>
                </button>-->
            </form>

        </div>
    </div>
</nav>
