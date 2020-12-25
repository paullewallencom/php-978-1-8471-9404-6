<?php

class peacock {

var $settings;

function GetDBSettings(){

$settings['dbuser'] ="root";
$settings['dbpassword'] = "";
$settings['database'] = "bookmarker";
$settings['host'] = "localhost";

return $settings;
}

}


?>