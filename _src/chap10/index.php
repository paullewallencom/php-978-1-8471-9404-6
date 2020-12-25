<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: login.php");
}

?>
<html>
<head>
<link rel="stylesheet" href="todonow_style.css" >
<script type="text/javascript" src="src/prototype.js"></script>
<script type="text/javascript" src="src/scriptaculous.js"></script>
<script type="text/javascript" src="src/effects.js"></script>

<script type="text/javascript" src="scripts.js"></script>
<title>Home Page</title>
</head>
<body>
	<img src="images/logo.png">
<p>

<span class="header-text">
<?php echo 'Welcome, '.$_SESSION['username']; ?>
</span>&nbsp;&nbsp;
|
<span class="MyLists">My Lists</span>
<span class="header-links">&nbsp;&nbsp;|&nbsp;<a class="sideMenu_links" href="AddLists.php">Create New List </a>&nbsp;&nbsp;|&nbsp;&nbsp;<a class="sideMenu_links" href="logout.php">Logout</a></span>&nbsp;&nbsp

<?php

require_once 'DBClass.php';
require_once 'Secure.php';

$secure = new Secure();
$db = new DBClass();

$GetListDetails = "SELECT ListID,ListName,MonthName(Date) as Month,Day(Date) as Day  from lists where ownerID=".$_SESSION['uid'];

$ListResult = $db->Query($GetListDetails);
$row_count = 0;

$color1 = "#FFFFFF";
$color2 = "#F0F8FF";

$num_rows = mysql_num_rows($ListResult);

if($num_rows>0)
{
echo '<ul class="ShowLists">';

while($row = $db->fetchArray($ListResult))
{

$sql2 = "SELECT COUNT(ItemID) from Items where ListID=".$row[ListID]." AND status='Incomplete'";

$result2 = $db->Query($sql2);
$row2 = $db->fetch_one_row($result2);

echo '<li><a href="ViewList.php?ListID='.$row[ListID].'">'.$row[ListName].'</a>&nbsp;<span class="ItemsInfo">

--'.$row2[0].' remaining items </span> &nbsp;&nbsp;<br><span class="DateDetails">on '.$row[Day].'&nbsp;'.$row[Month].'</span>
</li><p>';

$row_count++;

} // while loop ends here
echo "</ul>";

} // if num_rows are more
else
{
echo '<ul class="ShowLists">';

echo "</ul>";

}

?>



</body>
</html>
