<?php

// Set up the database connection
$username = DATABASE_USER;
$password = DATABASE_PASS;
$host = DATABASE_HOST;
$dbname = DATABASE_NAME;
$dsn = "mysql:host={$host};dbname={$dbname}";

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    display_error($e->getMessage());
}
