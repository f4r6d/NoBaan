<?php

$doc_root = $_SERVER['DOCUMENT_ROOT'];

// Get the application path
$uri = $_SERVER['REQUEST_URI'];
$dirs = explode('/', $uri);
$app_path = '/' . $dirs[1] . '/' . $dirs[2] . '/';

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
