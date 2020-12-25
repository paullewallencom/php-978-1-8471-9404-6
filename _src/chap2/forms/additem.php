<?php
mysql_connect("localhost", "root", "") or die(mysql_error()); // connects to the mysql db or outputs an error
mysql_select_db("test") or die(mysql_error()); // selects the database from the choosen serve or outputs an error

header("Content-Type: text/xml");
print'<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';

$the_name = $_POST['myinput'];

$sql = "INSERT INTO items (ItemID,ItemName) VALUES (NULL,'$the_name')";

$result = mysql_query($sql);

$rowID = mysql_insert_id();

if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}

else {
$sql = "SELECT ItemName from items where ItemID=".$rowID;
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$itemValue = $row[0];

echo '<response>';
echo '<ItemID>'.$rowID.'</ItemID>';
echo '<ItemName>'.$itemValue.'</ItemName>';
echo '</response>';

}
?>