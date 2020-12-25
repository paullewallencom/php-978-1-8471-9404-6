<?php

require_once 'DBClass.php';

$dbclass = new DBClass();

function tag_info() { 
  $result = mysql_query("SELECT * FROM tags GROUP BY tagName ORDER BY Rand() DESC"); 
  while($row = mysql_fetch_array($result)) { 
    $arr[$row['tagName']] = $row['count'];
  } 
  //ksort($arr); 
  return $arr; 
}

function tag_cloud() {

    $min_size = 20;
    $max_size = 60;

    $tags = tag_info();

    $minimum_count = min(array_values($tags));
    $maximum_count = max(array_values($tags));
    $spread = $maximum_count - $minimum_count;

    if($spread == 0) {
        $spread = 1;
    }

    $cloud_html = '';
    $cloud_tags = array();

	$step = ($max_size - $min_size)/($spread);


    foreach ($tags as $tag => $count) {
        $size = $min_size + ($count - $minimum_count) 
            * $step;

//  $size = ($max_size + $min_size)/$spread;
        $cloud_tags[] = '<a style="font-size: '. floor($size) . 'px' 
            . '" class="tag_cloud" href="http://localhost/content/SearchTag.php?tag=' . $tag 
            . '" title="\'' . $tag . '">' 
            . htmlspecialchars(stripslashes($tag)) . '</a>';
    }
    $cloud_html = join("\n", $cloud_tags) . "\n";
    return $cloud_html;

}


?>

<style type="text/css">
.tag_cloud
    {padding: 3px; text-decoration: none;
    font-family: verdana;     }
.tag_cloud:link  { color: #8FC486; }
.tag_cloud:visited { color: #BACC89; }
.tag_cloud:hover { color: #BACC89; background: #000000; }
.tag_cloud:active { color: #BACC89; background: #000000; }

div.wrapper{
	position:absolute;
	height:300px;
	width:500px;
	
	
}
</style>

<div id="wrapper" class="wrapper">
 <?php print tag_cloud(); ?>
</div> 