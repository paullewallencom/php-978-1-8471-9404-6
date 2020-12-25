<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: login.php");
}

else {

require_once 'includes/DBConnector.php';
require_once 'includes/users.php';
require_once 'includes/tutorials.php';

?>

<html>
<head>
<link rel="stylesheet" href="style.css">

<script type="text/javascript" src="src/lib/prototype.js"></script>
<script type="text/javascript" src="src/src/scriptaculous.js"></script>
<script type="text/javascript" src="src/src/effects.js"></script>
<script type="text/javascript" src="src/src/controls.js"></script>
<script type="text/javascript" src="scripts.js"></script>

<title>Home Page</title>
</head>
<body>
<img src="images/logo.png">
<p>
<div class="header-links">
<a href="index.php"><?php echo $_SESSION['username']."'s";?>&nbsp;Home</a>
<a href="submitTutorial.php">Submit New Tutorial</a><a href="searchTutorials.php">Search Tutorials</a><a href="tagCloud.php">Tag Cloud Search</a><a  href="logout.php">Logout</a></div>

<?php 

$db = new DBConnector();
$newuser = new users();
$newtutorial = new tutorials();

$ownerid = $_SESSION["uid"];

$sql = "SELECT tutorialID, tutorial_title, tutorial_desc FROM tutorials WHERE ownerid=".$ownerid;

$result = $db->perform_query($sql);

if($result)
	{
	echo '<div class="mytutorials">';
echo '<table id="mytutorials-table">';
	while($row= $db->fetch_array($result))
		{
	
	echo '<tr id='.$row[0].'><td><a class="mytutorial-links" href="viewTutorial.php?tutorialID='.$row[0].'">'.$row[tutorial_title].'</a></td><td>Edit</td><td><a href="javascript:deleteTutorial('.$row[0].')">Delete</a></td></tr>';
	echo '<tr><td>'.$row[tutorial_desc].'</td></tr>';
		}
		echo'</table>';


	echo '</div>';
	}
	else
	{
		echo "You have no articles submiited";
	}

}// else for SESSION ends here
?>
<body>
</html>
