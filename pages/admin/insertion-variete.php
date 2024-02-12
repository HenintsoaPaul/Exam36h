<?php
  include "static/header.php"
?>
    <div class="main">
        <div class="container">
            <div class="row">
                <form action="traitements/addVariete.php" method="POST" id="insertionForm" class="col-12 col-md-6 mx-auto">
                    <h1>Variete de the</h1>
                    <!-- Nom -->
                    <div class="form-group col-md-12">
                        <label for="nomVariete">Nom Variete</label>
                        <input class="form-control" type="text" name="nomVariete" id="nomVariete" required>
                    </div>
                    <div class="row">
                        <!-- OCCUPATION -->
                        <div class="form-group col-md-6"> 
                            <label for="occupation">Occupation</label>
                            <input class="form-control" type="number" name="occupation" id="occupation" required>
                        </div>
                        <!-- Rendement par pied -->
                        <div class="form-group col-md-6"> 
                            <label for="rendement">Rendement par pied</label>
                            <input class="form-control" type="number" name="rendement" id="rendement" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Add New Variete</button>
                </form>
            </div>
        </div>
    </div>
    <br />
    <script src="../../assets/js/bootstrap.min.js"></script>
</body>
</html>