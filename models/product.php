<?php

function get_products()
{
    global $cache_client;

    // key to cache results in cache system for next time getting products from cache system instead of database
    $key = CACHE_KEY;

    // if there is a cache connection error, then use database and ignore caching
    if (!$cache_client) {
        // $source = 'MySQL Server';
        global $db;
        $query = 'SELECT * FROM products';
        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $products = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement->closeCursor();
        } catch (PDOException $e) {
            return display_error($e->getMessage());
        }
    } else {
        
        // if products is not cached yet, query and cache it for the first time 
        if (!get_from_cache($key)) {
            // $source = 'MySQL Server';
            global $db;
            $query = 'SELECT * FROM products';
            try {
                $statement = $db->prepare($query);
                $statement->execute();
                $products = $statement->fetchAll(PDO::FETCH_ASSOC);
                $statement->closeCursor();
            } catch (PDOException $e) {
                return display_error($e->getMessage());
            }

            // save products list in cache for the next time
            set_on_cache($key, $products);

            // read from cache
        } else {
            // $source = CACHE_SYSTEM . ' Server';
            $products = get_from_cache($key);
        }
    }


    return $products;
}
