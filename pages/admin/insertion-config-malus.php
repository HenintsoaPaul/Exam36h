<?php
  include "static/header.php";

$className = "";
$insertLog = ""; 
if ( isset($_GET['message']) ) {
    $className = $_GET['message'] == "success" ? "success" : "danger";
    $insertLog = $_GET['message'] == "success" ? "Poids minimal configuré!" : "Oops! il y'a une erreur dans la configuration.";
}
?>

    <div class="main m-5">
        <div class="container">
            <div class="row">
                <form action="traitements/config-malus.php" method="post" id="insertionForm" class="col-12 col-md-6 mx-auto">
                    <div class="card p-5 rounded border-3">
                    <h1>Malus</h1>
                        <!-- insert LOG -->
                        <div >
                            <p class="text-<?= $className ?>"><?= $insertLog ?></p>
                        </div>
                        <!-- insert LOG -->

                        <div class="row mb-3">
                            <!-- Malus -->
                            <div class="form-group col-12 col-lg-6"> 
                                <label for="malusInput" class="form-label">Malus</label>
                                <input class="form-control" type="text" name="malusInput" id="malusInput" required>
                            </div>
                            <!-- Date debut -->
                            <div class="form-group col-12 col-lg-6"> 
                                <label for="dateInput" class="form-label">Date</label>
                                <input type="date" class="form-control" required name="dateInput" id="dateInput">
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success mt-3 d-">Save Config</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <br/>
    <script>
        activeCurrentPage("configMalus_li");
        activeCurrentPage("configDropdown");
    </script>
<?php
    include "static/footer.php";
?>