<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: login.php");
}

require_once 'DBClass.php';
require_once 'Secure.php';
require_once 'Lists.php';

$username = $_SESSION["sessioname"];
$userID = $_SESSION["userID"];

if(!isset($_POST["AddLists"]))
{
?>

<title>ADD NEW LIST</title>

<body>
	<img src="images/logo.png">
<p>
<link rel="stylesheet" href="todonow_style.css" >


<span class="header-text">
<?php echo 'Welcome, '.$_SESSION['username']; ?>
</span>&nbsp;&nbsp;
|
<span class="MyLists"><a href="index.php">My Lists</a></span>
<span class="header-links">&nbsp;&nbsp;|&nbsp;Create New List&nbsp;&nbsp;|&nbsp;&nbsp;<a class="sideMenu_links" href="logout.php">Logout</a></span>&nbsp;&nbsp


<br><br>
<div class="AddListForm">
<div class="MyNewList">Add New List</div>
<form action="AddLists.php" method="POST">
Enter a Title for the List<p>
<input type="text" name="ListTitle" size="35"><br><br>
<input type="submit" name="AddLists" value="Add This List">
</form>
</div>
<?php
} // if condition for this is where $POST check ends

else {

$db = new DBClass();

$newlist = new lists();

$title = $_POST['ListTitle'];
$ownerid = $_SESSION["uid"];

$query = $newlist->add_new_list($title,$ownerid);

//$AddListQuery = "INSERT INTO Lists (listID,ListName,ownerID,Date) VALUES (NULL,'$title','$ownerid',CURRENT_TIMESTAMP)";

$AddListResult = $db->Query($query);

//echo mysql_insert_id();
$sql = 'SELECT ListID, ListName from lists where ListID='.mysql_insert_id();

$result = $db->Query($sql);
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}

$row = $db->fetch_one_row($result);

function Redirect($time, $topage) {

echo "<meta http-equiv=\"refresh\" content=\"{$time}; url={$topage}\" /> ";

}

$time = 0;
$topage = 'ViewList.php?ListID='.$row[0];

Redirect($time, $topage);

} // else ends here

echo '</div>';


echo '<p><br><p><br>';


?>