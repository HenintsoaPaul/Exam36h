<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/font/bootstrap-icons.min.css">
    <script src="../../assets/js/affichage.js"></script>
    <title>Admin Magic Tea</title>
</head>
<body>
    <header class="shadow-lg">
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container d-flex">
                <div class="navbar-brand uppercase">
                    <p class="fw-bold">  Magic<span id="logoMark" class=" mx-1 px-1 bg-success rounded">Tea</span>  </p>
                </div>
                <div class="flex-grow-1 d-flex justify-content-center">
                    <ul class="navbar-nav gap-5">
                        <li class="nav-item">
                          <a class="nav-link" id="userHome_li" href="home.php">User Home<span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item" >
                          <a class="nav-link" id="ceuillette_li" href="ceuillette.php">Ceuillette</a>
                        </li>
                        <li class="nav-item" >
                          <a class="nav-link " id="depense_li" href="depense.php">Depense</a>
                        </li>
                        <li class="nav-item" >
                          <a class="nav-link" id="resultat_li" href="resultats.php">Resultats</a>
                        </li>
                      </ul>
                </div>
                <div class="rounded bg-light">
                  <a href="#" type="button" class="btn">Deconnexion</a>
                </div>
            </div>
        </div>
    </header>