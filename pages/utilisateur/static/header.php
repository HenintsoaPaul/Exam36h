<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/font/bootstrap-icons.min.css"> 
    <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">
    <script src="../../assets/js/affichage.js"></script>
    <link rel="stylesheet" href="../../assets/style.css">
    <title>Admin Magic Tea</title>
</head>
<body>
    <header class="shadow">
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container d-flex">
                <div class="navbar-brand uppercase">
                    <p class="fw-bold">  Magic<span id="logoMark" class=" mx-1 px-1 bg-success rounded">Tea</span>  </p>
                </div>
                <button class="navbar-toggler" id="collapser" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarToggle">
                      <ul class="navbar-nav col-2 flex-grow-1 justify-content-center mr-auto mt-2 mt-lg-0">
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
                        <li class="nav-item" >
                          <a class="nav-link" id="paiements_li" href="paiements.php">Paiements</a>
                        </li>
                        <li class="nav-item" >
                          <a class="nav-link" id="prevision_li" href="prevision.php">Prevision</a>
                        </li>
                      </ul>
                      <div class="rounded ">
                        <a href="../../index.php" type="button" class="btn hover-fill transition-fill">Deconnexion</a>
                      </div>
                  </div>
            </div>
          </div>
        <script>
          collapseAction("collapser");
        </script>
    </header>