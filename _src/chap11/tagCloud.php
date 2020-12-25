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
<a href="submitTutorial.php">Submit New Tutorial</a><a href="searchTutorials.php">Search Tutorials</a><a href="tagCloud.php">Tag Cloud Search</a><a  href="logout.php">Logout</a></div>


<?php

require_once 'includes/DBConnector.php';
require_once 'includes/Tutorials.php';
require_once 'includes/Tags.php';


$db= new DBConnector();
$tutorials= new Tutorials();
$tags= new Tags();

$all_tags = $tags->read_all_tags();

foreach ($all_tags as $tag =>$value)
{
	echo '<a style="font-size:'. rand(50,20). 'px' 
            . '" class="tag_cloud" href="http://localhost/chap11/includes/tags.php?s=' . $value
           . '" title="\'' . $tag . '">'.$value.'';

}

?>

</body>
</html>
