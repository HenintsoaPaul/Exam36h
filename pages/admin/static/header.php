<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/style.css">
    <script src="../../assets/js/affichage.js"></script>
    <title>Admin Magic Tea</title>
</head>
<body>
    <header class="shadow">
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <div class="navbar-brand uppercase">
                    <p class="fw-bold">  Magic<span id="logoMark" class=" mx-1 px-1 bg-success rounded">Tea</span>  </p>
                </div>
                <button class="navbar-toggler" id="collapser" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarToggle">
                  <div class="d-flex"></div>
                  <ul class="navbar-nav col-2 flex-grow-1 gap-2 justify-content-center mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                      <a class="nav-link" id="admin_li" href="home.php">Admin home<span class="sr-only"></span></a>
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
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" data-target="configs" id="configDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Configuration
                      </a>
                      <div class="dropdown-menu bg-light" aria-labelledby="configDropdown" id="configs" style="width:200px;">
                        <ul class="nav gap-3">
                          <li class="nav-item">
                            <a class="nav-link text-dark" id="configPoids_li" href="insertion-config-poids-min.php">Config poids minimal</a>
                          </li>
                          
                          <li class="nav-item">
                            <a class="nav-link text-dark" id="configMalus_li" href="insertion-config-malus.php">Config malus</a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link text-dark" id="configBonus_li" href="insertion-config-bonus.php">Config bonus</a>
                          </li>
                        </ul>      
                      </div>
                    </li>
                    
          
                    <li class="nav-item">
                      <a class="nav-link" id="prixVente_li" href="insertion-prix-vente.php">Prix de vente</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" id="categorie_li" href="insertion-categorie.php">Categorie</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="salaire_li" href="insertion-salaire.php">Salaire</a>
                      </li>
                    </ul>
                    <div class="rounded d-inline bg-light">
                      <a href="logout.php" type="button" class="btn hover-fill transition-fill">Deconnexion</a>
                    </div>
                </div>
                
                
        </div>
        <script>
          collapseAction("collapser");
          collapseAction("configDropdown");
    
        </script>
    </header>