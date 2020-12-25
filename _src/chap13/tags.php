<?php

class tags {

function add_tutorial_tags($tags, $tutorialID){

$temp_tags = explode(',', $tags);

    foreach ($temp_tags as $tag) {
        $tag = strtolower($tag);
		$query = "INSERT INTO tutorial_tags(tutorialID, tag) VALUES ('$tutorialID','".$tag."')";
		$result = mysql_query($query);
		if($result)
		{
			continue;
		}
	}
}

function read_tag_count($tag) {

$query = "SELECT COUNT(tag) as tag_count FROM tutorial_tags WHERE tag = '".$tag."'";

$result = mysql_query($query); 

if($result) {
	 while($row = mysql_fetch_array($result)) { 
	$arr[$row['tag_count']] = $row['tag_count'];
	} 

}
else {
		$arr = "Sorry, no tags with the same name";

	}
		return $arr; 
}


function read_all_tags() {
$query = "SELECT tag FROM tutorial_tags";

$result = mysql_query($query); 

if($result) {
	 while($row = mysql_fetch_array($result)) { 
	$all_tags[$row['tag']] = $row['tag'];

	} 
return $all_tags;

}

}

function read_results_for_tag($tag) {
$query = "SELECT tutorialID FROM tutorial_tags WHERE tag='".$tag."'";

$result = mysql_query($query); 

if($result) {
	 while($row = mysql_fetch_array($result)) { 
	$all_tags[$row['tutorialID']] = $row['tutorialID'];

	} 
return $all_tags;

}

}


}//tags class ends
?>