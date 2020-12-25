<?php

$value = $_POST['product_id'];

$dbuser ="root";
$dbpassword = "";
$database = "bookmarker";
$host = "localhost";

mysql_connect($host, $dbuser, $dbpassword);
mysql_select_db($database) or die("Unable to connect to DB");

$query="SELECT product_id, product_title FROM products WHERE product_id=".$value;


//	echo $query;
$result=mysql_query($query);

if(!$result) die("<ul><li>No Rows Found</li></ul>");

$row = mysql_fetch_row($result);
echo 'Product ID: '.$row[0].' | Product Title: '.$row[1];

?>
