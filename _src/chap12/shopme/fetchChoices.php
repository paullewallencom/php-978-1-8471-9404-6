<?php

$value = $_POST['title'];

$dbuser ="root";
$dbpassword = "";
$database = "bookmarker";
$host = 'localhost';

mysql_connect($host, $dbuser, $dbpassword);
mysql_select_db($database) or die("Unable to connect to DB");

$query="SELECT product_id, product_title FROM products WHERE product_title LIKE '%".$value."%'";
$result=mysql_query($query);

if(!$result) die("<ul><li>No Rows Found</li></ul>");

echo '<ul class="options" >';
while($row= mysql_fetch_array($result))
{
	echo '<li align="left" id="'.$row["product_id"].'" name="'.$row["product_title"].'">'.$row["product_title"].'</li>';
}
echo '</ul>';

?>
