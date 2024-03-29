<?php
require_once '../../inc/php/connection.php';
require_once '../../inc/php/crudFuncts/select.php';
include "static/header.php";

$connection = db_connect();
$allVarietes = getAllVarietes($connection);
closeConnection($connection);

$className = "";
$insertLog = "";
if ( isset($_GET['message']) ) {
    $className = $_GET['message'] == "success" ? "success" : "danger";
    $insertLog = $_GET['message'] == "success" ? "Prix de vente ajoutée!" : "Oops! Il y'a une erreur dans l'insertion du prix de vente.";
}
?>
    <div class="main my-5">
        <div class="container">
            <div class="row col-12">
                <form action="traitements/add-prix-vente.php" method="POST" id="insertionForm" class="col-12 col-md-6 mx-auto">
                <div class="card p-5 rounded border-3">    
                    <h1>Prix de vente</h1>
                    <!-- insert LOG -->
                    <div >
                        <p class="text-<?= $className ?>"><?= $insertLog ?></p>
                    </div>
                    <!-- insert LOG -->
                    <!-- variete -->
                    <div class="form-group col-12 mb-3"> 
                            <label for="idVariete" class="form-label">Variete</label>
                            <select name="idVariete" title="variete" class="form-select" required>
                                <option value="">Choisir une variete</option>
                                <?php foreach($allVarietes as $variete) { ?>
                                <option value="<?= $variete['idVarieteThe'] ?>"><?= $variete['NomVariete'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <div class="row mb-3">
                        <!-- Montant  -->
                        <div class="form-group col-12 col-lg-6">
                            <label for="montantInput" class="form-label">Montant</label>
                            <input type="text" name="montantInput" id="" class="form-control" required>
                        </div>
                        <!-- Date -->
                        <div class="form-group col-md-6"> 
                            <label for="dateInput" class="form-label">Date</label>
                            <input class="form-control" type="date" name="dateInput" id="dateInput" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between ">
                            <button type="submit" class="btn btn-success ">Valider</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <br />

    <script>
        activeCurrentPage("prixVente_li")
    </script>
<?php
    include "static/footer.php";
?>
