<?php
require_once ("config.php");

$pdo = null;

function connect_to_db(){
    global $pdo;
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;
    $user = DB_USER;
    $password = DB_PASSWORD;
    $dsn = "pgsql:host='$host';port=$port;dbname='$dbname';";
    $pdo = new PDO($dsn,"$user", "$password", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    return $pdo;
}

function get_all(){
    global $pdo;
    $result = $pdo->query("
                    SELECT * FROM movies
            ");
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $movies = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $movies[] = $row;
    }
    return $movies;
}

function search($something, $include_filter = false){
    global $pdo;
    
    if($include_filter && !$something){
        $result = $pdo->query("
                    SELECT * FROM movies
                    ORDER BY rate DESC
            ");
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $movies = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $movies[] = $row;
    }
    
    }elseif($include_filter && $something){
        $result = $pdo->query("
                    SELECT * FROM movies
                    WHERE movies_title LIKE '%$something%' ORDER BY rate DESC
            ");
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $movies = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $movies[] = $row;
    }
    
    }else {
    $result = $pdo->query("
                    SELECT * FROM movies
                    WHERE movies_title LIKE '%$something%'
            ");
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $movies = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $movies[] = $row;
    }
    }
    
    return $movies;
    
}