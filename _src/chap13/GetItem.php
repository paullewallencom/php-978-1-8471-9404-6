<?php
require_once 'includes/DBConnector.php';

$db= new DBConnector();


 header("Content-Type: text/xml");
 print'<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';

     $your_comments = $_POST['your_comments'];
     $tutorialID = $_POST['tutorialID'];
     $ownerID = $_POST['ownerID'];

 $sql = "INSERT INTO comments (commentID,tutorialID,ownerID,comment_desc,Date) VALUES (NULL,'$tutorialID','$ownerID','$your_comments',CURRENT_TIMESTAMP)";
	//mysql_query(s or die("somthing went wrong during Creating the CLub. MySQL said: ".mysql_error());

	$result = $db->perform_query($sql);


	$rowID = $db->get_last_insert_id();

	 if (!$result) {
	     echo 'Could not run query: ' . mysql_error();
	     exit;
	 }

	else {

	$sql = "SELECT comment_desc from comments where commentID=".$rowID;
	$result = $db->perform_query($sql);
	$row = $db->fetch_one_row($result);

	$comment_desc = $row[0];

echo '<response>';
echo '<commentID>'.$rowID.'</commentID>';
echo '<comment_desc>'.$comment_desc.'</comment_desc>';
echo '</response>';



}
?>