<?php

// helper function for showing errors
function display_error($error_message)
{
    include 'errors/error.php';
    exit;
}

// helper function for redirect
function redirect($url)
{
    session_write_close();
    header("Location: " . $url);
    exit;
}

// Get a function for sorting products on the specified key
function compare_factory($sort_key)
{
    $rev = 1;
    if (str_starts_with($sort_key, '-')) {
        $sort_key = ltrim($sort_key, '-');
        $rev = -1;
    }
    return function ($left, $right) use ($sort_key, $rev) {
        if ($left[$sort_key] == $right[$sort_key]) {
            return 0;
        } else if ($left[$sort_key] < $right[$sort_key]) {
            return -1 * $rev;
        } else {
            return 1 * $rev;
        }
    };
}

// Sort products on the specified key
function product_sort(&$products, $sort_key)
{
    $compare_function = compare_factory($sort_key);
    usort($products, $compare_function);
}
