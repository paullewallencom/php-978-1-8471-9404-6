<?php

$value = $_POST['cityName'];

$dbuser ="root";
$dbpassword = "";
$database = "trial";
$host = 'localhost';

mysql_connect($host, $dbuser, $dbpassword);
mysql_select_db($database) or die("Unable to connect to DB");

$query="SELECT states FROM cities WHERE cityName ='".$value."'";
$result=mysql_query($query);

if(!$result) die("Error dude");

while($row= mysql_fetch_array($result))
{
	echo $row["states"];
}


?>
