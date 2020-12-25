<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: login.php");
}

?>
<html>
<head>
<link rel="stylesheet" href="style.css" >
<title>Home Page</title>
</head>
<body>
	<img src="images/logo.png">
<p>

<div class="header-links">
<a href="index.php"><?php echo $_SESSION['username']."'s";?>&nbsp;Home</a>
<a href="buyProducts.php">Buy Products</a><a href="searchProducts.php">Search Products</a><a href="tagCloud.php">Search Using Tags</a><a  href="logout.php">Logout</a></div>


<?php

require_once 'includes/DBConnector.php';
require_once 'includes/Tags.php';


$db= new DBConnector();

$tags= new Tags();

$all_tags = $tags->read_all_tags();

foreach ($all_tags as $tag =>$value)
{
	echo '<a style="font-size:'. rand(50,20). 'px' 
            . '" class="tag_cloud" href="http://localhost/chap12/searchTags.php?tag=' . $value
           . '" title="\'' . $tag . '">'.$value.'';

}

?>

</body>
</html>
