<?php
require_once 'DBClass.php';

     $ListID = $_POST['ListID'];
     $user_name = $_POST['userID'];
     $itemID = $_POST['itemID'];

$db = new DBClass();
	$sql = "UPDATE items SET `status` = 'Incomplete' WHERE itemID =".$itemID;

	 $result = $db->Query($sql);
	 	 if (!$result) {
	 	     echo 'Could not run query: ' .mysql_error();
	 	     exit;
	 }
	else {

     $sql = "SELECT COUNT(itemID) from Items WHERE `status` = 'Incomplete' and ListID =".$ListID;
	$result = $db->Query($sql);

	$row = $db->fetch_one_row($result);
	$num = $row[0];

	echo 'You Have'.$num.' Of Incomplete Tasks';

	}

?>