<?php

class tags {

function add_tutorial_tags($tags, $tutorialID){

$temp_tags = explode(',', $tags);

    foreach ($temp_tags as $tag) {
        $tag = strtolower($tag);
		$query = "INSERT INTO product_tags(product_id, tag_name) VALUES ('$product_ID','".$tag."')";
		$result = mysql_query($query);
		if($result)
		{
			continue;
		}
	}
}

function read_tag_count($tag) {

$query = "SELECT COUNT(tag_name) as tag_count FROM product_tags WHERE tag_name = '".$tag."'";

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
$query = "SELECT tag_name FROM product_tags";

$result = mysql_query($query); 

if($result) {
	 while($row = mysql_fetch_array($result)) { 
	$all_tags[$row['tag_name']] = $row['tag_name'];

	} 
return $all_tags;

}

}

function read_results_for_tag($tag) {
$query = "SELECT product_id FROM product_tags WHERE tag_name='".$tag."'";

$result = mysql_query($query); 

if($result) {
	 while($row = mysql_fetch_array($result)) { 
	$all_tags[$row['product_id']] = $row['product_id'];

	} 
return $all_tags;

}

}


}//tags class ends
?>