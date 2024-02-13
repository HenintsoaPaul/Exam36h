<?php
include "static/header.php";

$className = "";
$insertLog = "";
if ( isset($_GET['message']) ) {
    $className = $_GET['message'] == "success" ? "success" : "danger";
    $insertLog = $_GET['message'] == "success" ? "New Categorie Depense Added Successfully!" : "Oops! Failed To Add New Categorie Depense.";
}
?>
    <div class="main m-5">
        <div class="container">
            <div class="row">
                <form action="traitements/addCategorie.php" method="post" id="insertionForm" class="col-12 col-md-6 mx-auto">
                    <div class="card p-5 rounded border-3">      
                        <h1>Categorie Depense</h1>
                        <!-- insert LOG -->
                        <div >
                            <p class="text-<?= $className ?>"><?= $insertLog ?></p>
                        </div>
                        <!-- insert LOG -->

                        <!-- Nom -->
                        <div class="form-group col-md-12">
                            <label for="nomInput" class="form-label">Nom Categorie</label>
                            <input class="form-control" type="text" name="nomInput" id="nomInput" required>
                        </div>
                    <div>

                      <button type="submit" class="btn btn-success mt-3">Add New Categorie Depense</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        activeCurrentPage("categorie_li")
      </script>
    <br />
<?php
    include "static/footer.php";
?>