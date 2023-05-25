<?php

define('SITE_TITLE', 'نوبان');
define('BASE_URL', 'http://localhost:8888/my_trainings/nobaan/');


define('DATABASE_HOST', 'localhost');
define('DATABASE_USER', 'root');
define('DATABASE_PASS', 'root');
define('DATABASE_NAME', 'nobaan');


// 'redis' or 'memcached'
define('CACHE_SYSTEM', 'memcached');
// time to expire cache in seconds
define('CACHE_TTL', 10);
// key for chache products in cache system
define('CACHE_KEY', 'PRODUCT_LIST');

// fill redis uri or fill the others; they are the same
// example local uri 'tcp://127.0.0.1:6379'
define('REDIS_URI', 'redis://farshid:Nobaan123-@redis-19330.c266.us-east-1-3.ec2.cloud.redislabs.com:19330');
define('REDIS_SCHEME', 'tcp');
define('REDIS_HOST', '127.0.0.1');
define('REDIS_PORT', '6379');
define('REDIS_PASSWORD', '');

// if you use memcached system fill this section
define('MEMCACHED_SERVER', '127.0.0.1');
define('MEMCACHED_PORT', '11211');

// DISCOUNT PERCENT for every product which has DISCOUNT
define('DISCOUNT_PERCENT', 10);

