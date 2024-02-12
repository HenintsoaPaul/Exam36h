<?php
  include "static/header.php"
?>
    <div class="main">
        <div class="container">
            <div class="row">
                <form action="" method="post" id="insertionForm" class="col-12 col-md-6 mx-auto">
                    <h1>Categorie</h1>
                    <!-- Nom -->
                    <div class="form-group col-md-12">
                        <label for="nomInput">Nom Categorie</label>
                        <input class="form-control" type="text" name="nomInput" id="nomInput" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">New Categorie</button>
                </form>
            </div>
        </div>
    </div>
    <br />
    <script src="../../assets/js/bootstrap.min.js"></script>
</body>
</html>