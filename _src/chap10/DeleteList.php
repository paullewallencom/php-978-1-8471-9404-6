<?php
require_once 'DBClass.php';

$ListID = $_POST['ListID'];

$db = new DBClass();

$sql = "DELETE FROM lists WHERE listID =".$ListID;

echo $sql;

$result = $db->Query($sql);
if (!$result)
	{
		echo 'Could not run query: ' .mysql_error();
	 	exit;
	}
	else {

     $sql = "DELETE FROM items WHERE ListID =".$ListID;
	
	$result2 = $db->Query($sql);

	if(result2)
	{
		echo "List Deleted Successfully";
	}
}

?>