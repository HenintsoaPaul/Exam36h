<?php
  include "static/header.php"
?>

    <div class="main m-5">
        <div class="container">
            <div class="row">
                <form action="traitements/addSalaire.php" method="post" id="insertionForm" class="col-12 col-md-6 mx-auto">
                    <div class="card p-5 rounded border-3">
                    <h1>Salaire</h1>
                    <div class="row">
                        <!-- Montant -->
                        <div class="form-group col-12"> 
                            <label for="montantInput">Montant Salaire</label>
                            <input class="form-control" type="text" name="montantInput" id="montantInput" required>
                        </div>
                        <!-- Date debut -->
                        <div class="form-group col-12"> 
                            <label for="dateInput">Date de debut</label>
                        <div class="form-group col-md-6"> 
                            <label for="dateInput">Date</label>
                            <input type="date" class="form-control" required name="dateInput" id="dateInput">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success mt-3 d-">New Parcelle</button>
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