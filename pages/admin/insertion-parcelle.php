<?php
require_once '../../inc/php/connection.php';
include '../../inc/php/crudFuncts/select.php';

$connection = db_connect();
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
                          <a class="nav-link" href="home.html">Admin Home<span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="insertion-variete.php">Variete</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="insertion-parcelle.php">Parcelle</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="insertion-ceuilleur.html">Cueilleur</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="insertion-categorie.html">Categorie</a>
                        </li>
                      </ul>
                </div>
                <div class="rounded bg-light">
                  <a href="#" type="button" class="btn">Deconnexion</a>
                </div>
            </div>
        </div>
    </header>

    <div class="main">
        <div class="container">
            <div class="row">
                <form action="traitements/addParcelle.php" method="POST" id="insertionForm" class="col-12 col-md-6 mx-auto">
                    <h1>Parcelle</h1>
                    <div class="row">
                        <!-- SURFACE -->
                        <div class="form-group col-md-6"> 
                            <label for="surface">Surface</label>
                            <input class="form-control" type="number" name="surface" id="surface" required>
                        </div>
                        <!-- variete -->
                        <div class="form-group col-md-6"> 
                            <label for="idVariete">Variete</label>
                            <select name="idVariete" title="variete" class="form-select" required>
                                <option value="">Choisir une variete</option>
                                <?php
                                $allVarietes = getAllVarietes($connection);
                                foreach ($allVarietes as $variete) { ?>
                                    <option value="<?= $variete['idVarieteThe'] ?>"><?= $variete['NomVariete'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Add New Parcelle</button>
                </form>
            </div>
        </div>
    </div>
    <br />
    <script src="../../assets/js/bootstrap.min.js"></script>
</body>
</html>
<?php
closeConnection($connection);
?>