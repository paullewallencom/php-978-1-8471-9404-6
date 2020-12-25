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
<a href="submitTutorials.php">Submit New Tutorial</a><a href="searchTutorials.php">Search Tutorials</a><a href="tagCloud.php">Tag Cloud Search</a><a  href="logout.php">Logout</a></div>

<?php

if(!isset($_POST["submitDetails"]))
{

?>

<div class="add-details-div">
<form action="tutorialDetails.php" method="POST" >
<span class="details-text">
Enter a title for the tutorial
</span>
<br>
<input class="submit-url" type="text" name="title">
<br>
<span class="details-text">
Enter description for the tutorial
</span>
<br>
<span class="submit-url">
<input type="text" name="desc">
</span>
<p>
<span class="details-text">
Enter Tags for the tutorial
</span>
<br>
<span class="submit-url">
<input type="text" name="tags">
</span>

<input type="hidden" name="tutorialID" value="<?php echo $tutorialID; ?>">
<p>
<input name="submitDetails" class="submit-button" type="submit" value="Submit now">
</form>
</div>

<?php
}

else
	{

require_once 'includes/DBConnector.php';
require_once 'includes/users.php';
require_once 'includes/tutorials.php';
require_once 'includes/tags.php';

$db = new DBConnector();
$newuser = new users();
$newtutorial = new tutorials();
$newtags = new tags();

$ownerid = $_SESSION["uid"];

$tutorialID = $_POST["tutorialID"];

$title = $_POST['title'];
$desc = $_POST['desc'];
$tags = $_POST['tags'];

$query = $newtutorial->add_tutorial_desc($title,$desc,$tutorialID);


$AddURLResult = $db->perform_query($query);

$tag_adding = $newtags->add_tutorial_tags($tags,$tutorialID);

if($AddURLResult)
	{
echo '<div class="note">';
		echo "Added the details";
echo "<a href='viewTutorial.php?tutorialID=".$tutorialID."'>View This Tutorial</a></div>";

	}

else
	{
		echo "Sorry, not possible";
	}

}

}// if session is set ends here

	?>

</body>
</html>
