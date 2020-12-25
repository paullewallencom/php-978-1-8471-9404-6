<?php

class users {

function add_new_user($firstname,$lastname, $user, $pass) {

$query= "INSERT INTO users (userid,firstName,lastName, username, password) VALUES (NULL,'$firstname','$lastname', '$user', '$pass')";

return $query;

}

function check_valid_user($username,$result,$enteredPassword) {

if($result['password'] == MD5($_POST['password'])) { // if the passwords match
session_start(); // start the session
header("Cache-control: private");
$_SESSION["sessioname"] = $_POST['username'];
$_SESSION["userID"] = $result['userID'];
header("location: index.php");
}
else {
echo "Incorrect login details please try again.";
}

} // function check_valid_user ends here

function logout() {
session_start();
unset($_SESSION["sessioname"]); // unset the variable
session_destroy(); // detroy it
header("location: index.php"); // head home

} //function logout ends here

} // class users ends 
?>
