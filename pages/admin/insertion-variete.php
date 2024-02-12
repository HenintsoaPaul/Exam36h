<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <title>Admin Magic Tea</title>
</head>
<?php if (isset($_GET['message'])) { ?>
    <script> alert("<?php echo $_GET['message'] ?>");</script>
<?php }?>
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
                <form action="traitements/addVariete.php" method="POST" id="insertionForm" class="col-12 col-md-6 mx-auto">
                    <h1>Variete de the</h1>
                    <!-- Nom -->
                    <div class="form-group col-md-12">
                        <label for="nomVariete">Nom Variete</label>
                        <input class="form-control" type="text" name="nomVariete" id="nomVariete" required>
                    </div>
                    <div class="row">
                        <!-- OCCUPATION -->
                        <div class="form-group col-md-6"> 
                            <label for="occupation">Occupation</label>
                            <input class="form-control" type="text" name="occupation" id="occupation" required>
                        </div>
                        <!-- Rendement par pied -->
                        <div class="form-group col-md-6"> 
                            <label for="rendement">Rendement par pied</label>
                            <input class="form-control" type="text" name="rendement" id="rendement" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Add New Variete</button>
                </form>
            </div>
        </div>
    </div>
    <br />
    <script src="../../assets/js/bootstrap.min.js"></script>
</body>
</html>