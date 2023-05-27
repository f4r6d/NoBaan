<?php

function get_products()
{
    global $cache_client;

    // key to cache results in cache system for next time getting products from cache system instead of database
    $key = CACHE_KEY;

    // if there is a cache connection error, then use database and ignore caching
    if (!$cache_client) {
        $source = 'MySQL Server, Cache system is down..';
        global $db;
        $query = 'SELECT * FROM products';
        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $products = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement->closeCursor();
        } catch (PDOException $e) {
            return display_error('get_products error', $e->getMessage());
        }
    } else {

        // if products is not cached yet, query and cache it for the first time 
        if (!get_from_cache($key)) {
            $source = 'MySQL Server, Cache was empty for the first view or deleted for Update stock after selling product.. ';
            global $db;
            $query = 'SELECT * FROM products';
            try {
                $statement = $db->prepare($query);
                $statement->execute();
                $products = $statement->fetchAll(PDO::FETCH_ASSOC);
                $statement->closeCursor();
            } catch (PDOException $e) {
                return display_error('get_products error', $e->getMessage());
            }

            // save products list in cache for the next time
            set_on_cache($key, $products);

            // read from cache
        } else {
            $source = CACHE_SYSTEM . ' Server';
            $products = get_from_cache($key);
        }
    }

    echo $source;
    return $products;
}

function get_product($product_id)
{
    global $db;
    $query = 'SELECT * FROM products WHERE id=:product_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $product = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
    } catch (PDOException $e) {
        return display_error('get_product error', $e->getMessage());
    }

    return $product;
}


function update_product_stock($product_id, $stock)
{
    global $db;
    $query = 'UPDATE products SET stock=:stock WHERE id=:product_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':stock', $stock);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
    } catch (PDOException $e) {
        return display_error('update_product_stock error', $e->getMessage());
    }

    return $result;
}
