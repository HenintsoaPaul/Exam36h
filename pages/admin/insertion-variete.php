<?php
require_once '../../inc/php/connection.php';
require_once '../../inc/php/crudFuncts/select.php';
include "static/header.php";

$connection = db_connect();
$mois = getAllMois( $connection );
closeConnection( $connection );

$className = "";
$insertLog = "";
if ( isset( $_GET['message'] ) ) {
    $className = $_GET['message'] == "success" ? "success" : "danger";
    $insertLog = $_GET['message'] == "success" ? "New Variete Added Successfully!" : "Oops! Failed To Add New Variete.";
}
?>

    <div class="main m-5">
        <div class="container">
            <div class="row">
                <form action="traitements/add-variete.php" method="POST" id="insertionForm" class="col-12 col-md-6 mx-auto">
                <div class="card p-5 rounded border-3">    
                <h1>Variete de the</h1>
                    <!-- insert LOG -->
                    <div class="mb-3">
                        <p class="text-<?= $className ?>"><?= $insertLog ?></p>
                    </div>
                    <!-- insert LOG -->

                    <!-- Nom -->
                    <div class="form-group col-md-12 mb-3">
                        <label for="nomVariete" class="form-label">Nom Variete</label>
                        <input class="form-control" type="text" name="nomVariete" id="nomVariete" required>
                    </div>
                    <div class="row mb-3">
                        <!-- OCCUPATION --> 
                        <div class="form-group col-md-6"> 
                            <label for="occupation" class="form-label">Occupation</label>
                            <input class="form-control" type="text" name="occupation" id="occupation" required>
                        </div>
                        <!-- Rendement par pied -->
                        <div class="form-group col-md-6"> 
                            <label for="rendement" class="form-label">Rendement par pied</label>
                            <input class="form-control" type="text" name="rendement" id="rendement" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="moisInput" class="form-label">Mois de regeneration</label>
                        <div class="row">
    <?php       for ($i=0; $i < count($mois) ; $i++) {?>
                    <div class="col-6 col-lg-4"><input type="checkbox" name="moisInput[]" id="" value="<?= $mois[$i]['idMois']?>"><?= $mois[$i]['NomMois']?> </div>
        <?php    }?>
                        </div>
                    <div>

                    <div class="d-flex justify-content-between mt-3">
                        <button type="submit" class="btn btn-success ">Add New Variete</button>
                        <a href="read-variete.php" type="button" class="link">Voir les varietes</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br />
    <script>
        activeCurrentPage("variete_li")
      </script>
    <?php
include "static/footer.php";
?>