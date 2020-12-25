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
<!-- <script type="text/javascript" src="scripts.js"></script> -->
<title>Home Page</title>
</head>
<body>
<img src="images/logo.png">
<p>
<div class="header-links">
<a href="index.php"><?php echo $_SESSION['username']."'s";?>&nbsp;Home</a>
<a href="submitTutorial.php">Submit New Tutorial</a><a href="searchTutorials.php">Search Tutorials</a><a href="tagCloud.php">Tag Cloud Search</a><a  href="logout.php">Logout</a></div>

<?php 

if(!isset($_POST["submitTutorial"]))
{

?>

<div class="tutorial-url">
<form action="submitTutorial.php" method="POST" >
<p>
<span class="submit-text">
Enter the URL of the tutorial
</span>
<br>
<input class="submit-url" type="text" name="tutorial_url" size="60">
<br>
<p>
<input class="submit-button" name="submitTutorial" type="submit" value="Submit now">
</form>
</div>

<?php
}

else {

$db = new DBConnector();
$newuser = new users();
$newtutorial = new tutorials();

$url = $_POST['tutorial_url'];
$ownerid = $_SESSION["uid"];

$query = $newtutorial->add_new_tutorial($url,$ownerid);

$AddURLResult = $db->perform_query($query);

if($AddURLResult)
	{
$sql = 'SELECT tutorialID from tutorials where tutorialID='.$db->get_last_insert_id();

$result = $db->perform_query($sql);
if (!$result)
{
    echo 'Could not run query: ' . mysql_error();
    exit;
}

$row = $db->fetch_one_row($result);

$time = 0;
$topage = 'tutorialDetails.php?tutorialID='.$row[0];

Redirect($time, $topage);

} // else if Addtutorialresult is TRUE
else {


echo '<div class="note">Thank you, the Tutorial already exists</div>';

}

} // else ends here

} // else for SESSION ends here

function Redirect($time, $topage) {

echo "<meta http-equiv=\"refresh\" content=\"{$time}; url={$topage}\" /> ";

}
?>


</body>
</html>
