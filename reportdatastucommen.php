<?
    //เรียกใช้ไฟล์ autoload.php ที่อยู่ใน Folder vendor
    //require_once __DIR__ . '../../vendor/autoload.php';
    require_once('vendor/autoload.php');

    //ตั้งค่าการเชื่อมต่อฐานข้อมูล
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "mayz_messs";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    mysqli_set_charset($conn, "utf8");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }



    $result = mysqli_query($conn, $sql);
    $content = "";

        $query1 = "SELECT DISTINCT student_code FROM apprenticeship order by student_code asc";
        $query1 = mysqli_query($conn,$query1);

    while ($i=mysqli_fetch_array($query1))
    {

      $query = "SELECT teacher_code FROM supervision WHERE student_code = $i[0]";
      $query = mysqli_query($conn,$query);

      $query3 =  "SELECT * FROM student WHERE student_code = $i[0]";
      $query3 = mysqli_query($conn,$query3);
      while ($s=mysqli_fetch_array($query3))

      {

        $content .= '<tr style="border:1px solid #000;">
        <td style="border-right:1px solid #000;padding:3px;text-align:left;"  >'.$s[0] .'</td>';


        $content .= '
        <td style="border-right:1px solid #000;padding:3px;text-align:left;"  >'.$s[1].''."  ".''.$s[2].'</td>';

      }
      $query4 =  "SELECT company_code,mentor_code FROM apprenticeship WHERE student_code = $i[0] ";
      $query4 = mysqli_query($conn,$query4);

      while ($s=mysqli_fetch_array($query4)){

      $query5 =  "SELECT company_name FROM company WHERE company_code =$s[0] ";
      $query5 = mysqli_query($conn,$query5);

      while ($z=mysqli_fetch_array($query5)){

      if(empty($z)){
        $content .= '
          <td style="border-right:1px solid #000;padding:3px;text-align:left;" width="2%"  >-</td>';
      }else{
      $content .= '
        <td style="border-right:1px solid #000;padding:3px;text-align:left;" width="2%"  >'.$z[0].'</td>';
      }
      }
      $query6 =  "SELECT mentor_name,mentor_surname FROM mentor WHERE mentor_code =$s[1] ";
      $query6 = mysqli_query($conn,$query6);

      while ($x=mysqli_fetch_array($query6)){

      if(empty($x)){
        $content .= '
          <td style="border-right:1px solid #000;padding:3px;text-align:left;" width="2%"  >-</td>';
      }else{
      $content .= '
        <td style="border-right:1px solid #000;padding:3px;text-align:left;" width="2%"  >'.$x[0].''."  ".''.$x[1].'</td>';
      }
      }
    }
    while ($y=mysqli_fetch_array($query))
    {
      $query7 =  "SELECT teacher_name,teacher_surname FROM teacher WHERE teacher_code =$y[0] ";
      $query7 = mysqli_query($conn,$query7);

      while ($v=mysqli_fetch_array($query7)){

      if(empty($v)){
        $content .= '
          <td style="border-right:1px solid #000;padding:3px;text-align:left;" width="2%"  >-</td>';
      }else{
      $content .= '
        <td style="border-right:1px solid #000;padding:3px;text-align:left;" width="2%"  >'.$v[0].''."  ".''.$v[1].'</td>';
      }
      }
    }
}


$mpdf = new mPDF('th', 'A4-L', '0', 'Garuda');


$head.= '
<style>
    body{
        font-family: "Garuda";//เรียกใช้font Garuda สำหรับแสดงผล ภาษาไทย
    }
</style>

<h2 style="text-align:center"></h2>

    <table id="bg-table" width="100%" style="border-collapse: collapse;font-size:10pt;margin-top:10px;">
    <tr style="border:1px solid #000;padding:4px;">
    <th style="border-right:1px solid #000;padding:4px;text-align:center;"   width="10%"><center>เลขประจำตัว</center></th>
    <th style="border-right:1px solid #000;padding:4px;text-align:center;"   width="10%" ><center>ชื่อ-สกุล</center></th>
    <th style="border-right:1px solid #000;padding:4px;text-align:center;"   width="20%" ><center>ชื่อสถานประกอบการ</center></th>
    <th style="border-right:1px solid #000;padding:4px;text-align:center;"   width="20%" ><center>ชื่อ-นามสกุล พี่เลี้ยง</center></th>
    <th style="border-right:1px solid #000;padding:4px;text-align:center;"   width="20%" ><center>ชื่ออาจารย์นิเทศ</center></th>';

$end = "</tbody>
</table>";

  mysqli_close($conn);

$mpdf->SetFont('THSaraban');
$mpdf->WriteHTML($head);

$mpdf->WriteHTML($content);

$mpdf->WriteHTML($end);

$mpdf->Output();
