<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>php-movies</title>
        <link href="<?php echo home_url('include/mycss.css'); ?>" rel="stylesheet" >
        <link href="<?php echo home_url('include/bootstrap.min.css'); ?>" rel="stylesheet" >
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
                    <a class="nav-link active" aria-current="page" href="<?php echo home_url(); ?>">Home</a>
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
                  <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" name="rate_filter" role="switch" id="rate_filter">
                      <label class="form-check-label" for="flexSwitchCheckDefault">filter by rate descending</label>
                  </div>
                  <input class="form-control me-2" type="search" name="something" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </nav>
        <br>
        
        
<?php

$something = null;
$rate_filter = 0;

if(empty($_POST)){
    return;
}
global $something;
global $rate_filter;
$something = strtolower($_POST['something']);
if(isset($_POST['rate_filter'])){
    $_POST['rate_filter'] = 1;
    $rate_filter = $_POST['rate_filter'];
}

