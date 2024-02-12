<?php
  include "static/header.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>Admin Magic Tea</title>
</head>
<body>
    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container d-flex">
                <div class="navbar-brand uppercase">
                    <p class="fw-bold">  Magic<span id="logoMark" class=" mx-1 px-1 bg-success rounded">Tea</span>  </p>
                </div>
                <div class="flex-grow-1 d-flex justify-content-center">
                    <ul class="navbar-nav gap-5">
                        <li class="nav-item active">
                          <a class="nav-link" href="home.php">Admin Home<span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="insertion-variete.php">Variete</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="insertion-parcelle.php">Parcelle</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="insertion-ceuilleur.php">Cueilleur</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="insertion-categorie.php">Categorie</a>
                        </li>
                      </ul>
                </div>
                <div class="rounded bg-light">
                  <a href="#" type="button" class="btn">Deconnexion</a>
                </div>
            </div>
        </div>
    </header>
    <section class="py-5" id="main">
        
        <div class="container">
          <div class="row gy-4 gy-md-0">
            <div class="col-12 text-center">
              <h1 class="fw-bold">
                Welcome to the admin page
              </h1>
              <p class="fw-light">Dans cette partie vous allez pouvoir administer les 
                <a href="insertion-variete.php" class="link">Varietes</a> ,
                <a href="insertion-parcelle.php" class="link">Parcelles</a> ,
                <a href="insertion-ceuilleur.php" class="link">Ceuilleurs</a> ,
                <a href="insertion-categorie.php" class="link">Categorie</a>
                <a href="insertion-salaire.php" class="link">Salaire</a>
              </p>
          </div>
        </div>
      </section>
<?php
  include "static/footer.php"
?>