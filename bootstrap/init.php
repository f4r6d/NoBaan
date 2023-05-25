<?php

$doc_root = $_SERVER['DOCUMENT_ROOT'];
$app_path = '/' . APP_PATH;

// Set the include path
set_include_path($doc_root . $app_path);


include 'config.php';
include 'vendor/autoload.php';
include 'models/database.php';
include 'util/cacher.php';
include 'models/product.php';
include 'util/helpers.php';

// initialize cache client
$cache_client = get_cache_client();

// Start session to store user and cart data
session_start();
