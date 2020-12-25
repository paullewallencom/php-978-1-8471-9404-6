<?php
/*
Class: DBClass
Purpose: Call the dbsettings from DBConfig class
Methods related to the dbms
*/

require_once 'DBConfig.php';

class DBClass extends DBConfig {

var $theQuery;
var $link;

// Function: DbConnector, Purpose: Connect to the database
function DBClass(){

// Load settings from parent class DBConfig
$settings = DBConfig::getSettings();

// Get the main settings from the array we just loaded
$host = $settings['dbhost'];
$db = $settings['dbname'];
$user = $settings['dbusername'];
$pass = $settings['dbpassword'];

// Connect to the database
$this->link = mysql_connect($host, $user, $pass);
mysql_select_db($db);
register_shutdown_function(array(&$this, 'close'));
}



//Function: query, Purpose: Execute a database query
function query($query) {

$this->theQuery = $query;
return mysql_query($query, $this->link);

}

// Function: fetchArray, Purpose: Get array of query results 
function fetchArray($result) {

return mysql_fetch_array($result);

}

function fetch_one_row($result) {

return mysql_fetch_array($result);

}

// Function: close, Purpose: Close the connection
function close() {

mysql_close($this->link);

}


}
?>

