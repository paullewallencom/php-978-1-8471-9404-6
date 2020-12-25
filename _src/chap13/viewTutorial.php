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
<script type="text/javascript" src="scripts.js"></script>

<script type="text/javascript" src="src/lib/prototype.js"></script>
<script type="text/javascript" src="src/src/scriptaculous.js"></script>
<script type="text/javascript" src="src/src/effects.js"></script>
<script type="text/javascript" src="src/src/controls.js"></script>
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

if($result) {
$row= $db->fetch_one_row($result);
echo '<div>';
echo '<table class="view-tutorial"><tr><td>Tutorial URL</td><td>'.$row[1].'</td></tr>';
echo '<tr><td>Tutorial Title</td><td>'.$row[2].'</td></tr>';
echo '<tr><td>Tutorial Description</td><td>'.$row[3].'</td></tr>';
echo '</table>';
echo '</div>';

} // if result else ends here

echo '<div><table id="show-comments" class="show-comments"></table></div>';

echo '<div id="add-comments"><a href="Javascript:showCommentsForm()">Add Comments</a></div>';
echo '<div id="hide-comments" style="display:none"><a href="Javascript:hideCommentsForm()">Hide Comments</a></div>';

echo '<div class="comments-form" id="comments-form" style="display:none"><form id="myform" method="POST" onsubmit="return false;">';
echo '<input type="hidden" size="45" name="tutorialID" id="tutorialID" value="'.$tutorialID.'"><input type="hidden" size="45" name="ownerID"  id="ownerID" value="'.$ownerid.'">Add Your Comments<br><input type="text" size="45" name="your_comments" id="your_comments"><br><input type="button" onclick="addComments()" value="Add Comments"></form></div>';

}// else if session ends here



?>

</body>
</html>
