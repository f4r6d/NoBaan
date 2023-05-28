<?php

define('SITE_TITLE', 'فروشگاه نوبان');

// set this configs with your local configurations
define('BASE_URL', 'http://localhost:8888/my_trainings/nobaan/');
define('APP_PATH', '');


define('DATABASE_HOST', 'localhost');
define('DATABASE_USER', 'root');
define('DATABASE_PASS', 'root');
define('DATABASE_NAME', 'nobaan');


// 'redis' or 'memcached'
define('CACHE_SYSTEM', 'redis');
// time to expire cache in seconds
define('CACHE_TTL', 3600);
// key for chache products in cache system
define('CACHE_KEY', 'PRODUCT_LIST');

// fill redis uri or fill the others; they are the same
define('REDIS_URI', 'tcp://127.0.0.1:6379');
// define('REDIS_URI', 'redis://farshid:Nobaan123-@redis-19330.c266.us-east-1-3.ec2.cloud.redislabs.com:19330');
define('REDIS_SCHEME', 'tcp');
define('REDIS_HOST', '127.0.0.1');
define('REDIS_PORT', '6379');
define('REDIS_PASSWORD', '');

// if you use memcached system fill this section
define('MEMCACHED_SERVER', '127.0.0.1');
define('MEMCACHED_PORT', '11211');
