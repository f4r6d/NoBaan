<?php

function get_redis_client()
{
    try {
        if (!empty(REDIS_URI)) {
            $cache_client = new Predis\Client(REDIS_URI);
        } else {
            $cache_client = new Predis\Client([
                'scheme' => REDIS_SCHEME,
                'host'   => REDIS_HOST,
                'port'   => REDIS_PORT,
                'password' => REDIS_PASSWORD,
            ]);
        }

        // check client is connected to server
        $cache_client->ping();
    } catch (\Predis\Connection\ConnectionException $e) {
        return false;
    }
    return $cache_client;
}

function set_on_redis($key, $val)
{
    global $cache_client;

    $cache_client->set($key, serialize($val));
    // cache only for CACHE_TTL in config file in seconds
    $cache_client->expire($key, CACHE_TTL);
}

function get_from_redis($key)
{
    global $cache_client;
    if ($cache_client->get($key)) {

        return unserialize($cache_client->get($key));
    }
}

function clear_from_redis($key)
{
    global $cache_client;
    if ($cache_client) {

        $cache_client->del($key);
    }
}
