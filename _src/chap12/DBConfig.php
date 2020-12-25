<?php
class DBConfig {

var $settings;

function getSettings() {

// Database variables
$settings['dbhost'] = 'localhost';
$settings['dbusername'] = 'root';
$settings['dbpassword'] = '';
$settings['dbname'] = 'bookmarker';

// return all the db settings required
return $settings;

}

}
?>