<?php
require_once "DBClass.php";

$dbclass = new DBClass();
$username = $_POST['username'];

$name= stripslashes($username);

//echo $name;

     $sql = "SELECT userID from users where username=".$name."";

	$result= $dbclass->query($sql);
//	 $result = mysql_query($sql);

	 $num = mysql_num_rows($result);

 if ($num>0) {

		echo 'UserName is NOT avaliable';
 	  }
	else {

	echo 'UserName is avaliable';

	}

?>