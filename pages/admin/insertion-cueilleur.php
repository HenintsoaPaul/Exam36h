<?php
require_once '../../inc/php/connection.php';
require_once '../../inc/php/crudFuncts/select.php';
include "static/header.php";

$connection = db_connect();
$genres = getAllGenre($connection);
closeConnection($connection);

$className = "";
$insertLog = "";
if ( isset($_GET['message']) ) {
    $className = $_GET['message'] == "success" ? "success" : "danger";
    $insertLog = $_GET['message'] == "success" ? "New Cueilleur Added Successfully!" : "Oops! Failed To Add New Cueilleur.";
}
?>
    <div class="main m-5">
        <div class="container">
            <div class="row">
                <form action="traitements/addCueilleur.php" method="POST" id="insertionForm" class="col-12 col-md-6 mx-auto">
                <div class="card p-5 rounded border-3">    
                    <h1>Cueilleur</h1>
                    <!-- insert LOG -->
                    <div >
                        <p class="text-<?= $className ?>"><?= $insertLog ?></p>
                    </div>
                    <!-- insert LOG -->

                    <!-- Nom -->
                    <div class="form-group col-md-12">
                        <label for="nomInput " class="form-label">Nom Cueilleur</label>
                        <input class="form-control" type="text" name="nomInput" id="nomInput" required>
                    </div>

                    <div class="row">
                        <!-- Date de naissance -->
                        <div class="form-group col-md-6"> 
                            <label for="naissanceInput" class="form-label">Date de naissance</label>
                            <input class="form-control" type="date" name="naissance" required id="naissanceInput">
                        </div>
                        <!-- Genre -->
                        <div class="form-group col-md-6"> 
                            <label for="genreInput" class="form-label">Genre</label>
                            <select name="genreInput" title="genre" class="form-select" required>
                                <option value="">Choisir votre genre </option>
                                <?php foreach( $genres as $genre ) { ?>
                                <option value="<?= $genre['idGenre'] ?>"><?= $genre['NomGenre'] ?></option>
                                <?php   }   ?>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                            <button type="submit" class="btn btn-success ">Add New Cueilleur</button>
                            <a href="read-ceuilleur.php" type="button" class="link">Voir les ceuilleurs</a>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <br />
    <script>
        activeCurrentPage("ceuilleur_li")
      </script>
    <?php
include "static/footer.php";
?>