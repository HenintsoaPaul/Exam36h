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
    $insertLog = $_GET['message'] == "success" ? "New Parcelle Added Successfully!" : "Oops! Failed To Add New Parcelle.";
}
?>
    <div class="main m-5">
        <div class="container">
            <div class="row">
                <form action="traitements/addParcelle.php" method="POST" id="insertionForm" class="col-12 col-md-6 mx-auto">
                <div class="card p-5 rounded border-3">    
                    <h1>Parcelle</h1>
                    <!-- insert LOG -->
                    <div >
                        <p class="text-<?= $className ?>"><?= $insertLog ?></p>
                    </div>
                    <!-- insert LOG -->

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
                                <?php foreach($allVarietes as $variete) { ?>
                                <option value="<?= $variete['idVarieteThe'] ?>"><?= $variete['NomVariete'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div>

                        <button type="submit" class="btn btn-success mt-3">Add New Parcelle</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <br />
<?php
    include "static/footer.php";
?>
