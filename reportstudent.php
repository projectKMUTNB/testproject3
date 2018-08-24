<?php
  require_once('vendor/autoload.php');
@session_start();
require_once('includeteacher/connect.php');
if(!isset($_SESSION['teacher_code']))
header("location:login.php");
if(isset($_GET['logout'])){
  session_destroy();
  header("location:login.php");
}

    //เรียกใช้ไฟล์ autoload.php ที่อยู่ใน Folder vendor
    //require_once __DIR__ . '../../vendor/autoload.php';
    $servername = "localhost";
    $username = "mayz";
    $password = "sB0k55NO";
    $dbname = "mayz_messs";
    $conn = mysqli_connect($servername, $username, $password, $dbname);


    $teacher_code  = $_SESSION['teacher_code'];
    $student_code  =  $_GET['id'];
    $content = "";
    $i=0;

    $query3 =  "SELECT score_cs FROM crecodestudentevaluation WHERE student_code='$student_code' AND (mentor_code='2')";
    $query3 = mysqli_query($conn,$query3);

    $query = "SELECT * FROM mainrecordcomstudent";
    $query = mysqli_query($conn,$query);
    $i=1;
    $innum = array();

    while ($j=mysqli_fetch_array($query3))
    {

    $innum[]=$j[0];

    }


     $l=0;

    while ($m=mysqli_fetch_array($query))
    {

        $a++;
        $query1 = "SELECT crcs_name FROM choicerecordcomstudent where mrcs_id = $a";
        $query1 = mysqli_query($conn,$query1);


                                        $content .= '<tr style="border:1px solid #000;">
                                        <td style="border-right:1px solid #000;padding:3px;text-align:left;"  >'.$a.''.".".''.$m[1] .'</td>';
        if(mysqli_num_rows($query1)==0){

        $content .= '<td style="border-right:1px solid #000;padding:3px;text-align:center;"  > '.$innum[$l].'</td></tr>';

        $l++;

        }

        $b=0;

        while ($c=mysqli_fetch_array($query1))

        {

        $b++;
        $content.='<tr style="border:1px solid #000;">
        <td style="border-right:1px solid #000;padding:3px;text-align:left;"  >'.$a.''.".".''.$b.' '.$c[0].'</td>';
        $content .= '<td style="border-right:1px solid #000;padding:3px;text-align:center;"  > '.$innum[$l].'</td></tr>';

        $l++;

   }
  }

  $content.='<tr style="border:1px solid #000;">
  <td style="border-right:1px solid #000;padding:4px;text-align:center;"   width="80%"><center>คำแนนรวม</center></td>
  <td style="border-right:1px solid #000;padding:4px;text-align:center;"   width="20%" ><center>'.array_sum($innum).' </center></td> ';

  mysqli_close($conn);




  $mpdf = new mPDF('th', 'A4', '0', 'Garuda');

  $head = '
  <style>
      body{
          font-family: "Garuda";//เรียกใช้font Garuda สำหรับแสดงผล ภาษาไทย
      }
  </style>

  <h2 style="text-align:center">แบบประเมินนักศึกษา</h2>

  <table id="bg-table" width="100%" style="border-collapse: collapse;font-size:10pt;margin-top:8px;">
      <tr style="border:1px solid #000;padding:4px;">
      <td style="border-right:1px solid #000;padding:4px;text-align:center;"   width="80%"><center>หัวข้อการประเมิน</center></td>
      <td style="border-right:1px solid #000;padding:4px;text-align:center;"   width="20%" ><center>ระดับความคิดเห็น </center></td>

     </tr>

  </thead>
      <tbody>';

  $end = "</tbody>
  </table>";



  $mpdf->SetFont('THSaraban');
  $mpdf->WriteHTML($head);

  $mpdf->WriteHTML($content);

  $mpdf->WriteHTML($end);

  $mpdf->Output();
