<?php

class tutorials {

function add_new_tutorial($url, $ownerid){

$query = "INSERT INTO Tutorials (tutorialID,tutorial_url,ownerID,Date) VALUES (NULL,'$url','$ownerid',CURRENT_TIMESTAMP)";

return $query;
}

function view_tutorial($tutorialID) {

$query = "SELECT tutorialID, tutorial_url, tutorial_title, tutorial_desc, ownerID FROM tutorials WHERE tutorialID=".$tutorialID;

return $query;

}

function add_tutorial_desc($title, $desc,$tutorialID){

$query = "UPDATE tutorials SET tutorial_title='".$title ."', tutorial_desc ='".$desc."' WHERE tutorialID =".$tutorialID ;

return $query;
}


}// tutorial class ends here

?>