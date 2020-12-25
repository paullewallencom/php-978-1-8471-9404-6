<?php
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: login.php");
}

require_once 'includes/DBConnector.php';
require_once 'includes/users.php';
require_once 'includes/tutorials.php';

$db = new DBConnector();
$newuser = new users();
$newtutorial = new tutorials();

$ownerid = $_SESSION["uid"];

$title = $_POST['title'];
$desc = $_POST['desc'];
$tags = $_POST['tags'];

$query = $newtutorial->add_tutorial_desc($title,$desc,$tags,$tutorialID);

echo $query;

$AddURLResult = $db->perform_query($query);

if($AddURLResult)
	{
		echo "Added the details";
	}

else
	{
		echo "Sorry, not possible";
	}
?>