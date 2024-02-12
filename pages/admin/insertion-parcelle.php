<?php
require_once 'inc/php/connection.php';

$connection = db_connect();
?>
<?php
  include "static/header.php"
?>
    <div class="main">
        <div class="container">
            <div class="row">
                <form action="traitements/addParcelle.php" method="POST" id="insertionForm" class="col-12 col-md-6 mx-auto">
                    <h1>Parcelle</h1>
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
                                <?php
                                $allVarietes = getAllVarietes($connection);
                                foreach ($allVarietes as $variete) { ?>
                                    <option value="<?= $variete['idVarieteThe'] ?>"><?= $variete['NomVariete'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Add New Parcelle</button>
                </form>
            </div>
        </div>
    </div>
    <br />
    <script src="../../assets/js/bootstrap.min.js"></script>
</body>
</html>
<?php
closeConnection($connection);
?>