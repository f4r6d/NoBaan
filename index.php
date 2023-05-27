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

// get sort key from get request if exists and save it in session
$sort_key = filter_input(INPUT_GET, 'sort_key');
if ($sort_key) {
    $_SESSION['sort_key'] = $sort_key;
}

if (!isset($_SESSION['sort_key'])) {
    $_SESSION['sort_key'] = '-id';
}

// get action from post request
$action = filter_input(INPUT_POST, 'action');
if ($action == 'خرید') {

    // get product from database 
    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
    $product = get_product($product_id);

    // check if product is available (stock is more than 0)
    if (!$product['stock']) {
        $title = $product['name'];
        $error_message = 'به اتمام رسیده است';
        display_error($title, $error_message);
    }

    $phone_number = filter_input(INPUT_POST, 'phone_number');
    // calculate amount of order 
    $amount = $product['price'] * (1 - $product['discount'] / 100);
    $discounted = 0;

    // check if product has discount? 
    if ($product['discount']) {

        $discounted = 1;

        // check if user has bought discounted order before?
        if (bought_discounted($phone_number)) {

            // order amount without discount
            $amount = $product['price'];
            $product_name = $product['name'];

            // save order temporarily in session if user wants to order without discount
            $_SESSION['temp_order'] = [
                'product_id' => $product_id,
                'product_name' => $product_name,
                'phone_number' => $phone_number,
                'amount' => $amount,
            ];

            // redirect to home page with error message
            $title = '<button data-modal-target="confirm-modal" data-modal-toggle="confirm-modal" type="button">خرید بدون تخفیف</button>';
            $message = "  شما قبلا با شماره موبایل {$phone_number} یکبار سفارش تخفیف دار ثبت کرده اید. درصورت تمایل روی خرید بدون تخیفیف کلیک کنید";
            display_error($title, $message);
        }
    }

    // if there is not any errors, buy the product
    buy($product_id, $phone_number, $amount, $discounted);

    // update product stock
    update_product_stock($product_id, $product['stock'] - 1);

    // clear old products list from cache  
    clear_from_cache(CACHE_KEY);

    // redirect to home page with success message
    $title = $product['name'];
    $message = ' به مبلغ ' . $amount . ' تومان برای شماره موبایل ' . $phone_number . ' با موفقیت ثبت شد';
    display_message($title, $message);
}

// order product without discount 
if ($action == 'تایید') {
    $product_id = $_SESSION['temp_order']['product_id'];
    $phone_number = $_SESSION['temp_order']['phone_number'];
    $amount = $_SESSION['temp_order']['amount'];
    $discounted = 0;
    $product = get_product($product_id);
    
    // place the order without discount
    buy($product_id, $phone_number, $amount, $discounted);

    // update product stock
    update_product_stock($product_id, $product['stock'] - 1);

    // clear old products list from cache  
    clear_from_cache(CACHE_KEY);

    // redirect to home page with success message
    $title = $product['name'];
    $message = ' به مبلغ ' . $amount . ' تومان برای شماره موبایل ' . $phone_number . ' با موفقیت ثبت شد';
    display_message($title, $message);
}


// get products from database or cache
$products = get_products();

// sort by sort key
product_sort($products, $_SESSION['sort_key']);

// show products list
include 'views/product_list.php';
