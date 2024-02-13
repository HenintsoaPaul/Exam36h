<?php
  include "static/header.php";

  $className = "";
  $insertLog = "";
  if ( isset($_GET['message']) ) {
      $className = $_GET['message'] == "success" ? "success" : "danger";
      $insertLog = $_GET['message'] == "success" ? "New Variete Added Successfully!" : "Oops! Failed To Add New Variete.";
  }
?>

    <div class="main m-5">
        <div class="container">
            <div class="row">
                <form action="traitements/addVariete.php" method="POST" id="insertionForm" class="col-12 col-md-6 mx-auto">
                <div class="card p-5 rounded border-3">    
                <h1>Variete de the</h1>
                    <!-- insert LOG -->
                    <div >
                        <p class="text-<?= $className ?>"><?= $insertLog ?></p>
                    </div>
                    <!-- insert LOG -->

                    <!-- Nom -->
                    <div class="form-group col-md-12">
                        <label for="nomVariete" class="form-label">Nom Variete</label>
                        <input class="form-control" type="text" name="nomVariete" id="nomVariete" required>
                    </div>
                    <div class="row">
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