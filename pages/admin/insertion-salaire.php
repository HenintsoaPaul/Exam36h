<?php
  include "static/header.php"
?>

    <div class="main">
        <div class="container">
            <div class="row">
                <form action="traitements/addSalaire.php" method="post" id="insertionForm" class="col-12 col-md-6 mx-auto">
                    <h1>Salaire</h1>
                    <div class="row">
                        <!-- Montant -->
                        <div class="form-group col-md-6"> 
                            <label for="montantInput">Montant Salaire</label>
                            <input class="form-control" type="number" name="montantInput" id="montantInput" required>
                        </div>
                        <!-- Date debut -->
                        <div class="form-group col-md-6"> 
                            <label for="dateInput">Date</label>
                            <input type="date" class="form-control" required name="dateInput" id="dateInput">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">New Parcelle</button>
                </form>
            </div>
        </div>
    </div>
    <br />
    <script src="../../assets/js/bootstrap.min.js"></script>
</body>
</html>