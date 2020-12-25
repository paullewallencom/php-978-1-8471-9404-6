<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: login.php");
}

?>
<?php 
require_once 'DBClass.php';
require_once 'Secure.php';
?>

<link rel="stylesheet" href="todonow_style.css" >

<script type="text/javascript" src="src/prototype.js"></script>
<script type="text/javascript" src="src/scriptaculous.js"></script>
<script type="text/javascript" src="src/effects.js"></script>

<title>View List</title>

<body>
	<img src="images/logo.png">
<p>

<span class="MyLists"><a href="index.php">My Lists</a></span>
<p>

<script type="text/javascript" src="scripts.js"></script>
<?php
$ListID = $_GET["ListID"];
$userID = $_SESSION["uid"];
$username = $_SESSION["username"];

$db = new DBClass();

$sql = "SELECT ListName from Lists where ListID=".$ListID;

$result = $db->Query($sql);

$row = $db->fetch_one_row($result);
echo '<span class="list-title"><br>'.$row[0].'</span>';

// THis will fetch the items that the list contains

$sql = 'SELECT itemName, itemID from items where ListID='.$ListID.' and status="Incomplete"';

$result = $db->Query($sql);

 if (!$result) {
	     echo 'Could not run query: ' . mysql_error();
	     exit;
	 }

$num = mysql_num_rows($result);

if ($num==0) {
	     echo ' ';
	 }

$row_count =1;
$checkID="";

echo '<div id="ItemTree" class="ItemTree">';
while($row = $db->fetchArray($result))
{

//echo $row[1];

//$checkCount = $row_count;

$checkCount = $row[1];
$row_count = $checkCount;

$checkDIV= "DIV".$row_count;

echo '<div id="'.$checkDIV.'" class="ItemRow"><input class="ItemList" type="checkbox" name="vehicle" id="'.$checkCount.'" value="'.$row[itemName].'" onclick="MarkDone(this.id)">'.$row[itemName].'</div>';

$row_count++;

} // while loop ends here
echo "</div>";

echo '<p><a id="AddItemLink" class="AddItemLink" href="Javascript:ShowAddItem()">Add Another Item</a><br>';
echo "<br>";

echo '<div id="ShowAddItem" class="ShowAddItem" style="display:none;"><form id="myform" action="AddItems.php" method="post" onsubmit="return false;">';
echo '<input type="hidden" name="userID" id="userID" value="'.$userID.'" /><p>';
echo '<input type="hidden" name="ListID" id="ListID" value="'.$ListID.'" /><p>';
echo '<br>Enter a New Item to this List<br><br>';
echo '<input type="text" name="myinput" id="myinput"  size="25"/><br><br>';
echo '<input type="button" value="Submit!" onclick="AddItem()"> <b>Or</b> <a href="Javascript:CancelAddItem()" id="CancelItem">Cancel</a>';

echo '</form></div>';

$sql = 'SELECT itemName, itemID from items where ListID='.$ListID.' and status="Completed"';

$result = $db->Query($sql);

 if (!$result) {
	     echo 'Could not run query: ' . mysql_error();
	     exit;
	 }

$num = mysql_num_rows($result);

if ($num==0) {
	     echo '<div id="Completed" class="Completed"></div>';
	    	 }

	 else
	 {

echo '<p><div id="Completed" class="Completed">';


while($row = $db->fetchArray($result))
{


$checkCount = $row[1];
$row_count = $checkCount;

$checkDIV= "DIV".$row_count;

echo '<div id="'.$checkDIV.'" class="ItemComplete" ><input class="ItemList" checked="true" type="checkbox" name="vehicle" id="'.$checkCount.'" value="'.$row[itemName].'" onclick="MarkUnDone(this.id)">'.$row[itemName].'</div>';

$row_count++;

} // while loop ends here
echo "</div>";

}

echo '<p><br><p><br>';


?>





