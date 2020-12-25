<?php

require_once 'includes/Peacock.php';

class DBConnector extends peacock {

var $link;
var $Thequery;

function DBConnector() {

$settings = peacock::GetDBSettings();

$dbuser =$settings['dbuser'];
$dbpassword = $settings['dbpassword'];
$database = $settings['database'];
$host = $settings['localhost'];

mysql_connect($host, $dbuser, $dbpassword);

mysql_select_db($database) or die("Unable to connect to DB");

register_shutdown_function(array(&$this,'close'));

} // function DBConnector ends here

function close(){

mysql_close();
} // function close ends here

function perform_query($query) {

$result = mysql_query($query);

return $result;
} // function PerformQuery Ends here

function fetch_array($sql) {

return mysql_fetch_array($sql);

} // function FetchArray Ends here

function fetch_one_row($sql) {

return mysql_fetch_row($sql);

} // function Fetch_one_row Ends here

function get_last_insert_id() {

return mysql_insert_id();
} // function get_last_insert_id Ends here

} 
?>
