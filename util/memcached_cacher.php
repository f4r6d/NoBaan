<?php


function get_memcached_client()
{


    $server = MEMCACHED_SERVER;
    $port = MEMCACHED_PORT;
    $cache_client = new Memcached();

    // Add server
    if (!$cache_client->addServer($server, $port)) {
        return false;
    }

    // check server is connected
    if (!$cache_client->add('test', 'val', 1)) {
        return false;
    }

    return $cache_client;
}

function set_on_memcached($key, $val)
{
    global $cache_client;
    if ($cache_client) {

        $cache_client->add($key, serialize($val), CACHE_TTL);
    }
}

function get_from_memcached($key)
{
    global $cache_client;
    if ($cache_client) {

        return unserialize($cache_client->get($key));
    }
}


function clear_from_memcached($key)
{
    global $cache_client;

    if ($cache_client) {
        $cache_client->delete($key);
    }
}
