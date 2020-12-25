<?php

class Products {

function view_product($product_id) {

$query = "SELECT product_id,product_title FROM products WHERE product_id=".$product_id;

return $query;

}

function read_all_products() {

$query = "SELECT product_id, product_title FROM products";

return $query;

}


function search_by_tags($tag) {

	$query = "SELECT product_id FROM product_tags WHERE tag_name = '".$tag."'";

	return $query;
}

}// tutorial class ends here

?>