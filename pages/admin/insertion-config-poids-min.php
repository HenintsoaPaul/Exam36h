<?php
  include "static/header.php";

$className = "";
$insertLog = "";
if ( isset($_GET['message']) ) {
    $className = $_GET['message'] == "success" ? "success" : "danger";
    $insertLog = $_GET['message'] == "success" ? "New Salaire Added Successfully!" : "Oops! Failed To Add New Salaire.";
}
?>

    <div class="main m-5">
        <div class="container">
            <div class="row">
                <form action="" method="post" id="insertionForm" class="col-12 col-md-6 mx-auto">
                    <div class="card p-5 rounded border-3">
                    <h1>Poids minimal</h1>
                        <!-- insert LOG -->
                        <div >
                            <p class="text-<?= $className ?>"><?= $insertLog ?></p>
                        </div>
                        <!-- insert LOG -->

                        <!-- Ceuilleur -->
                        <div class="form-group col-12 mb-3">
                            <label for="cueilleurInput" class="form-label"> Cueilleur </label>
                            <select name="cueilleurInput" id="cueilleurInput" class="form-select" required>
                                <option value="">Choisir un cueilleur</option>
                                <option value="1"> C1 </option>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <!-- Montant -->
                            <div class="form-group col-12 col-lg-6"> 
                                <label for="montantInput" class="form-label">Poids minimal</label>
                                <input class="form-control" type="text" name="montantInput" id="montantInput" required>
                            </div>
                            <!-- Date debut -->
                            <div class="form-group col-12 col-lg-6"> 
                                <label for="dateInput" class="form-label">Date de debut</label>
                                <input type="date" class="form-control" required name="dateInput" id="dateInput">
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success mt-3">Save Config</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <br/>
    <script>
        activeCurrentPage("configPoids_li")
    </script>
<?php
    include "static/footer.php";
?>