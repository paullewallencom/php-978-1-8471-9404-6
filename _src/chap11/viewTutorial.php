<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: login.php");
}

else {

require_once 'includes/DBConnector.php';
require_once 'includes/users.php';
require_once 'includes/tutorials.php';

$tutorialID = $_GET['tutorialID'];
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
<a href="submitTutorial.php">Submit New Tutorial</a><a href="searchTutorials.php">Search Tutorials</a><a href="searchTutorials.php">Manage Tutorials</a><a href="tagCloud.php">Tag Cloud Search</a><a  href="logout.php">Logout</a></div>

<?php

$db = new DBConnector();
$newuser = new users();
$newtutorial = new tutorials();

$ownerid = $_SESSION["uid"];

$username = $_SESSION["username"];

if($_GET["tutorialID"])
	{
	$tutorialID = $_GET["tutorialID"];
	}
	else if($_POST["tutorialID"])
	{
	$tutorialID = $_POST["tutorialID"];
	}

$query = $newtutorial->view_tutorial($tutorialID);

//echo $query;

$result = $db->perform_query($query);

$row= $db->fetch_one_row($result);
echo '<div>';
echo '<table class="view-tutorial"><tr><td>Tutorial Title</td><td>'.$row[1].'</td></tr>';
echo '<tr><td>Tutorial Description</td><td>'.$row[2].'</td></tr>';
echo '<tr><td>Tutorial Tags</td><td>'.$row[3].'</td></tr>';
echo '</table>';
echo '</div>';
}
?>

</body>
</html>
