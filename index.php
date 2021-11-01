<?php 
require_once 'config.php';

$dsn = "pgsql:host='127.0.0.1';port=5432;dbname='dbpython';";
$pdo = new PDO($dsn,"postgres", "king.kian007", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

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

function search($something){
    global $pdo;
    $result = $pdo->query("
                    SELECT * FROM movies
                    WHERE movies_title LIKE '%$something%'
            ");
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $movies = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $movies[] = $row;
    }
    return $movies;
}

function process_inputs(){
    if(empty($_POST)){
        return;
    }
    global $something;
    $something = strtolower($_POST['something']);
    
}
?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>php-movies</title>
        <link href="mycss.css" rel="stylesheet" >
        <link href="bootstrap.min.css" rel="stylesheet" >
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="<?php echo HOME_URL; ?>">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled">Disabled</a>
                </li>
              </ul>
                <form class="d-flex" method="POST">
                  <input class="form-control me-2" type="search" name="something" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </nav>
        <br>
        <?php
        $something = null;
        process_inputs();
        if(!$something):
            $movies = get_all();
        else:
            $movies = search($something);
        endif;
        $counter = 0;
        foreach ($movies as $movies) { ?>
            <div id="first_div">
                <p> 
                    <?php
                        echo $counter."- ".$movies['movies_title'];
                    ?>
                </p>
<!--                <pre>        </pre>-->
                <span id="rate"><?php echo "----".$movies['rate']."----".'<br>'; ?></span>
            </div>
            <?php 
            $counter += 1;
        }  ?>
        
        
        
        <<script src="bootstrap.bundle.min.js"></script>
    </body>
</html>



