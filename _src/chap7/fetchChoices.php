<?php

$value = $_POST['city'];

$dbuser ="root";
$dbpassword = "";
$database = "trial";
$host = 'localhost';

mysql_connect($host, $dbuser, $dbpassword);
mysql_select_db($database) or die("Unable to connect to DB");

$query="SELECT * FROM cities WHERE cityName LIKE '%".$value."%'";
$result=mysql_query($query);

if(!$result) die("<ul><li>No Rows Found</li></ul>");

echo '<ul class="options" >';
while($row= mysql_fetch_array($result))
{
	echo '<li align="left" name="'.$row["cityName"].'">'.$row["cityName"].'</li>';
}
echo '</ul>';

?>
