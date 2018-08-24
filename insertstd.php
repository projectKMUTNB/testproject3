<?

mysql_connect("localhost","root","12345678") or die(mysql_error());
mysql_select_db("mayz_messs") or die(mysql_error());
$cs1 = "SET character_set_results=utf8";
$cs2 = "SET character_set_client = utf8";
$cs3 = "SET character_set_connection = utf8";
@mysql_query($cs1) or die('Error query: ' . mysql_error());
@mysql_query($cs2) or die('Error query: ' . mysql_error());
@mysql_query($cs3) or die('Error query: ' . mysql_error());


$sql = "INSERT INTO location(location_x,location_y,student_code) ";
$sql .= " VALUES('".$_POST["location_x"]."', '".$_POST["location_y"]."', '".$_POST["student_code"]."') ";
echo $sql;
mysql_query($sql);


?>
