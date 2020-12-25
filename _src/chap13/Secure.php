<?php
/*
Class: Secure.php
Purpose: To clean up the data to prevent sql injections, data validations etc
*/

class Secure {


// Its imp to clean the data beforing entering or manipulating with server 
// This is imp to prevent SQL injection etc
function clean_data($value, $handle) {

   if (get_magic_quotes_gpc()) {
       $value = stripslashes($value);
   }

   if (!is_numeric($value)) {
       $value = "'" . mysql_real_escape_string($value, $handle) . "'";
   }
   return $value;
}

} // class ends here
?>