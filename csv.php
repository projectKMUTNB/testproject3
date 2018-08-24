<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);




$con = mysqli_connect("localhost","root","12345678","messs");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

    if(isset($_POST['submit']))
    {
         $fname = $_FILES['sel_file']['name'];
         echo 'Archivo Cargado: '.$fname.' ';
         $chk_ext = explode(".",$fname);

         if(strtolower(end($chk_ext)) == "csv")
         {

             $filename = $_FILES['sel_file']['tmp_name'];
             $handle = fopen($filename, "r");

	   		set_time_limit(0);

             while (($data = fgetcsv($handle, 10000, ",")) !== FALSE)
             {
                $sql = "INSERT into student(student_code,student_name,student_surname,student_department,status_id,email_student,student_password,statusp_id) values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]')";
                mysqli_query($con,$sql) or die(mysql_error());

             }

             fclose($handle);
             echo "Import Sussces!";

         }
         else
         {
             echo "Fail !";
         }


    }

    ?>
	<!DOCTYPE html>
	<html lang="es-MX">
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	</head>
	<body>
    <h1>IMPORT CSV</h1>
    <form action='<?php echo $_SERVER["PHP_SELF"];?>' method='post' enctype="multipart/form-data">
        import : <input type='file' name='sel_file' size='20'>
        <input type='submit' name='submit' value='submit'>
    </form>
	</body>
	</html>
