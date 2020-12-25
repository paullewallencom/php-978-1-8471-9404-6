<?php

require_once 'includes/DBConnector.php';
require_once 'includes/Tutorials.php';

$db= new DBConnector();

$tutorials= new Tutorials();

$tag_array= "sai,ram,raksha";
$tutorials->add_tutorial_tags($tag_array,10);

$name = 'raksha';
$tags = $tutorials->read_tag_count($name);

echo $tags;
$num = sizeof($tags);
echo $num;
//echo $value;
//echo $tag;
foreach ($tags as $tag =>$value)

echo $value;
//echo $key;

$all_tags = $tutorials->read_all_tags();

foreach ($all_tags as $tag =>$value)

echo $value;




//-----------------------------

$tags = $tutorials->read_results_for_tag($name);

$num = sizeof($tags);
echo $num;
foreach ($tags as $tag =>$value)
{


$query = $tutorials->view_tutorial_result($value);

$result = $db->perform_query($query);

$row= $db->fetch_one_row($result);
echo '<div>';
echo '<table class="view-tutorial"><tr><td>Tutorial Title</td><td>'.$row[1].'</td></tr>';
echo '<tr><td>Tutorial Description</td><td>'.$row[2].'</td></tr>';
echo '<tr><td>Tutorial Tags</td><td>'.$row[3].'</td></tr>';
echo '</table>';
echo '</div>';
}






//echo $key;


//function add_tutorial_tags($tags, $tutorialID){


/*
function tag_info() { 
	
require_once 'includes/DBConnector.php';
$db= new DBConnector();

$query=	"SELECT tutorial_tags FROM tutorials";

 $result = $db->perform_query($query); 

  while($row = $db->fetch_array($result)) { 
	$arr[$row['tutorial_tags']] = $row['count'];
 } 
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

*/
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
 <?php //print tag_cloud(); ?>
</div> 