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
            <div class="row col-12">
                <form action="traitements/add-salaire.php" method="post" id="insertionForm" class="col-12 col-md-6 mx-auto">
                    <div class="card p-5 rounded border-3">
                    <h1>Salaire</h1>
                        <!-- insert LOG -->
                        <div >
                            <p class="text-<?= $className ?>"><?= $insertLog ?></p>
                        </div>
                        <!-- insert LOG -->

                    <div class="row">
                        <!-- Montant -->
                        <div class="form-group col-12 col-lg-6"> 
                            <label for="montantInput" class="form-label">Montant Salaire</label>
                            <input class="form-control" type="text" name="montantInput" id="montantInput" required>
                        </div>

                        <!-- Date debut -->
                         
                            <div class="form-group col-12 col-lg-6">
                                <label for="dateInput" class="form-label">Date de debut</label>
                                <input type="date" class="form-control" required name="dateInput" id="dateInput">
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between mt-3">
                            <button type="submit" class="btn btn-success ">Add New Salaire</button>
                            <a href="read-salaire.php" type="button" class="link">Voir les salaires</a>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <br/>
    <script>
        activeCurrentPage("salaire_li")
    </script>
<?php
    include "static/footer.php";
?>