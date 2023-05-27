<?php

include 'bootstrap/init.php';

$sort_keys = [
    'name' => 'حروف الفبا',
    '-id' => 'جدیدترین',
    'id' => 'قدیمی ترین',
    '-price' => 'گران ترین',
    'price' => 'ارزان ترین',
    '-discount' => 'با تخفیف',
];

// get sort key from post or get request
$_SESSION['sort_key'] = filter_input(INPUT_GET, 'sort_key');
if ($_SESSION['sort_key'] == NULL) {
    $_SESSION['sort_key'] = '-id';
}


// get sort key from post or get request
$action = filter_input(INPUT_POST, 'action');
if ($action == 'خرید') {
    die(var_dump($_REQUEST));
}


// get products from database or cache
$products = get_products();

// sort by sort key
product_sort($products, $_SESSION['sort_key']);


include 'views/product_list.php';
