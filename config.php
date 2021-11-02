<?php
require_once 'lib/db.php';
include_once 'lib/module.php';

define('SITE_URL', 'http://localhost/php-movie/');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'dbpython');
define('DB_PORT', 5432);
define('DB_USER', 'postgres');
define('DB_PASSWORD', 'king.kian007');

function home_url($path = null){
    if(!$path || $path == '/'){
        return SITE_URL;
    }
    return SITE_URL . $path;
}




connect_to_db();