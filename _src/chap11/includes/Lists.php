<?php

class lists {

function add_new_list($title, $ownerid){

$query = "INSERT INTO Lists (listID,ListName,ownerID,Date) VALUES (NULL,'$title','$ownerid',CURRENT_TIMESTAMP)";

return $query;
}

/*
function show_details_of_list(){


}


delete_this_list(){


}

edit_this_list(){


}




*/
}


?>