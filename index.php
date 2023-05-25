<?php

include 'bootstrap/init.php';

// get sort key from post or get request
$sort_key = filter_input(INPUT_POST, 'sort_key');
if ($sort_key == NULL) {
    $sort_key = filter_input(INPUT_GET, 'sort_key');
    if ($sort_key == NULL) {
        $sort_key = 'name';
    }
}  

// get products from database or cache
$products = get_products();

// sort by sort key
product_sort($products, $sort_key);


include 'views/product_list.php';
