<?php
@session_start();
require_once('connect.php');
if(!isset($_SESSION['teacher_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  unset($_SESSION['access_token']);
  $gClient->revokeToken();
  session_destroy();
  header("location:login.php");
}





$teacher_code = $_SESSION['teacher_code'];

$s = "SELECT * FROM teacher where teacher_code = $teacher_code" ;
$query = mysqli_query($conn,$s);
$s = mysqli_fetch_array($query);
?>


<a href="#" class="logo">
  <span class="logo-mini"><b>ME</b>S</span>
  <span class="logo-lg"><b>MESSS</b></span>
</a>
<nav class="navbar navbar-static-top">
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <?php
          if(isset($_SESSION['picture'])){ ?>

             <img src="<?php echo $_SESSION['picture'] ?>" class="user-image" alt="User Image">
             <span class="hidden-xs"><?php echo $_SESSION['givenName'].' '.$_SESSION['familyName']; ?></span>
           </a>

                   <ul class="dropdown-menu">
                     <li class="user-header">

                    <img src="<?php echo $_SESSION['picture'] ?>" class="img-circle" alt="User Image">

                       <p>
                         <?php echo $_SESSION['givenName'].' '.$_SESSION['familyName']; ?>
                         <small></small>
                       </p>
                     </li>
                     <li class="user-footer">
                       <div class="pull-left">
                         <a href="profileteacheredit.php" class="btn btn-default btn-flat">ตั้งค่าโปรไฟล์</a>
                       </div>
                       <div class="pull-right">
                         <a onclick="window.location.href='?logout'" class="btn btn-default btn-flat">ออกจากระบบ</a>
                       </div>
                     </li>
                   </ul>
                 </li>
               </ul>
             </div>
           </nav>

        <?php } ?>

        <?php
        if(!isset($_SESSION['picture'])){
        $image = $s['img_teacher'];
      if (empty($image)) $image = "user.png";
?>




         <img src="images/img-teacher/<?php echo $image ;?>" class="user-image" alt="User Image">
         <span class="hidden-xs"><?php echo $_SESSION['teacher_name'].' '.$_SESSION['teacher_surname']; ?></span>
       </a>

               <ul class="dropdown-menu">
                 <li class="user-header">

                <img src="images/img-teacher/<?php echo $image ;?>" class="img-circle" alt="User Image">

                   <p>
                     <?php echo $_SESSION['teacher_name'].' '.$_SESSION['teacher_surname']; ?>
                     <small></small>
                   </p>
                 </li>
                 <li class="user-footer">
                   <div class="pull-left">
                     <a href="profileteacheredit.php" class="btn btn-default btn-flat">ตั้งค่าโปรไฟล์</a>
                   </div>
                   <div class="pull-right">
                     <a onclick="window.location.href='?logout'" class="btn btn-default btn-flat">ออกจากระบบ</a>
                   </div>
                 </li>
               </ul>
             </li>
           </ul>
         </div>
       </nav>
 <?php } ?>
