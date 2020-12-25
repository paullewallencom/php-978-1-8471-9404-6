<?php
header("Content-Type: text/xml");
print'<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';

	$the_name = $_POST['myinput'];
    $List_name = $_POST['ListID'];
    $user_name = $_POST['userID'];

 $sql = "INSERT INTO items (ItemID,ListID,ownerID,itemName,status,Date) VALUES (NULL,'$List_name','$user_name','$the_name','Incomplete',CURRENT_TIMESTAMP)";
	//mysql_query(s or die("somthing went wrong during Creating the CLub. MySQL said: ".mysql_error());


require_once 'DBClass.php';

$db= new DBClass();

$result = $db->Query($sql);

$rowID = mysql_insert_id();

if (!$result) {
	echo 'Could not run query: ' . mysql_error();
	exit;
}
else {

	$sql = "SELECT itemName from items where ItemID=".$rowID;
	$result = $db->Query($sql);
	$row = $db->fetch_one_row($result);

	$itemValue = $row[0];

echo '<response>';
echo '<ItemID>'.$rowID.'</ItemID>';
echo '<ItemValue>'.$itemValue.'</ItemValue>';
echo '</response>';

}
?>