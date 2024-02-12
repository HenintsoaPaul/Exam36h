<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/font/bootstrap-icons.min.css">
    <script src="../../assets/js/affichage.js"></script>
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
                        <li class="nav-item">
                          <a class="nav-link" id="admin_li" href="home.php">Admin Home<span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="variete_li" href="insertion-variete.php">Variete</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="parcelle_li" href="insertion-parcelle.php">Parcelle</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="ceuilleur_li" href="insertion-cueilleur.php">Ceuilleur</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="categorie_li" href="insertion-categorie.php">Categorie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="salaire_li" href="insertion-salaire.php">Salaire</a>
                          </li>
                      </ul>
                </div>
                <div class="rounded bg-light">
                  <a href="#" type="button" class="btn">Deconnexion</a>
                </div>
            </div>
        </div>
    </header>