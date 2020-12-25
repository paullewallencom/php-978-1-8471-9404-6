<?php

$value = $_POST['title'];

$dbuser ="root";
$dbpassword = "";
$database = "bookmarker";
$host = 'localhost';

mysql_connect($host, $dbuser, $dbpassword);
mysql_select_db($database) or die("Unable to connect to DB");

$query="SELECT * FROM tutorials WHERE tutorial_title LIKE '%".$value."%'";
$result=mysql_query($query);

if(!$result) die("<ul><li>No Rows Found</li></ul>");

echo '<ul class="options" >';
while($row= mysql_fetch_array($result))
{
	echo '<li align="left" name="'.$row["tutorial_title"].'">'.$row["tutorial_desc"].'</li>';
}
echo '</ul>';

?>
