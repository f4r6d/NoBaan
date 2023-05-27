<?php
include 'memcached_cacher.php';
include 'redis_cacher.php';

// get proper cache system based on config file
function get_cache_client()
{
    return ('get_' . CACHE_SYSTEM . '_client')();
}

// set data in cache system based on config file
function set_on_cache($key, $val)
{
    return ('set_on_' . CACHE_SYSTEM)($key, $val);
}

// get data from cache system based on config file
function get_from_cache($key)
{
    return ('get_from_' . CACHE_SYSTEM)($key);
}

// clear cache
function clear_from_cache($key)
{
    return ('clear_from_' . CACHE_SYSTEM)($key);
}