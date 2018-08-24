

<?php
    //เรียกใช้ไฟล์ autoload.php ที่อยู่ใน Folder vendor
    //require_once __DIR__ . '../../vendor/autoload.php';
    require_once('vendor/autoload.php');

    //ตั้งค่าการเชื่อมต่อฐานข้อมูล
    $servername = "localhost";
    $username = "mayz";
    $password = "sB0k55NO";
    $dbname = "mayz_messs";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    mysqli_set_charset($conn, "utf8");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }



    $result = mysqli_query($conn, $sql);
    $content = "";
    $i=0;

//ดึงคะแนน
    //$query3 =  "SELECT `insval` FROM `insertdstd` WHERE (`stdcode`=5806021420164) ";
    //$query3 = mysqli_query($conn,$query3);

    $query = "SELECT * FROM mainrecordcomstudent";
    $query = mysqli_query($conn,$query);

        $query1 = "SELECT  DISTINCT student_code  FROM crecodestudentevaluation   ";
        $query1 = mysqli_query($conn,$query1);



  //  $i=1;
    $innum = array();


//เอาคะแนนไปเก็บในarray
$a=1;
    while ($j=mysqli_fetch_array($query3))
    {

                  $innum[]=$j[0];
                  //
    }


     $l=0;

    while ($i=mysqli_fetch_array($query1))
    {

      $query3 =  "SELECT * FROM `student` WHERE `student_code`=$i[0]  ";
      $query3 = mysqli_query($conn,$query3);


      while ($s=mysqli_fetch_array($query3))

      {

        /*$query1 = "SELECT crcs_name FROM choicerecordcomstudent where mrcs_id = $a";
        $query1 = mysqli_query($conn,$query1);*/

                                $content .= '<tr style="border:1px solid #000;">
                                <td style="border-right:1px solid #000;padding:3px;text-align:left;"  >'.$s[0] .'</td>';


                                                                $content .= '
                                                                <td style="border-right:1px solid #000;padding:3px;text-align:left;"  >'.$s[1].''."  ".''.$s[2].'</td>';

                                                                $query4 =  "SELECT `score_cs` FROM `crecodestudentevaluation` WHERE `student_code`=$s[0] ";
                                                                $query4 = mysqli_query($conn,$query4);

        while ($s=mysqli_fetch_array($query4)){


                                                                                              $content .= '
                                                                                                      <td style="border-right:1px solid #000;padding:3px;text-align:left;" width="2%"  >'.$s[0] .'</td>';

        }
                                                             //

                                                            //                              $content .= '
                                                              //                                  <td style="border-right:1px solid #000;padding:3px;text-align:left;" width="2%"  >'.$n[0] .'</td>';
}

                                                              //}

}

/*  $content.='<tr style="border:1px solid #000;">
  <td style="border-right:1px solid #000;padding:4px;text-align:center;"   width="80%"><center>คำแนนรวม</center></td>
  <td style="border-right:1px solid #000;padding:4px;text-align:center;"   width="20%" ><center>'.array_sum($innum).' </center></td> ';*/











$mpdf = new mPDF('th', 'A4-L', '0', 'Garuda');


$head.= '
<style>
    body{
        font-family: "Garuda";//เรียกใช้font Garuda สำหรับแสดงผล ภาษาไทย
    }
</style>

<h2 style="text-align:center">แบบประเมินนักศึกษา</h2>

<table id="bg-table" width="100%" style="border-collapse: collapse;font-size:10pt;margin-top:8px;">
    <tr style="border:1px solid #000;padding:4px;">
    <th style="border-right:1px solid #000;padding:4px;text-align:center;"   width="10%"><center>เลขประจำตัว</center></th>
    <th style="border-right:1px solid #000;padding:4px;text-align:center;"   width="10%" ><center>ชื่อ สกุล</center></th>';
    while ($e=mysqli_fetch_array($query))
    {

$head.= '  <th style="border-right:1px solid #000;padding:4px;text-align:center;" colspan="4"  width="10%" ><center>'.$e[1] .'</center></th>';

}

$head.= '<th style="border-right:1px solid #000;padding:4px;text-align:center;"   width="5%" ><center>70 คะแนนสถานประกอบการ</center></th>

  </tr>

</thead>
    <tbody>';

$end = "</tbody>
</table>";

  mysqli_close($conn);

$mpdf->SetFont('THSaraban');
$mpdf->WriteHTML($head);

$mpdf->WriteHTML($content);

$mpdf->WriteHTML($end);

$mpdf->Output();
