<?php
  include "static/header.php"
?>
    <div class="main m-5">
        <div class="container">
            <div class="row">
                <form action="traitements/addCategorie.php" method="post" id="insertionForm" class="col-12 col-md-6 mx-auto">
                    <div class="card p-5 rounded border-3">      
                    <h1>Categorie</h1>
                    <!-- Nom -->
                    <div class="form-group col-md-12"> 
                        <label for="nomInput">Nom Categorie</label>
                        <input class="form-control" type="text" name="nomInput" id="nomInput" required>
                    </div>
                    <div>

                      <button type="submit" class="btn btn-success mt-3">New Categorie</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <br />
    <script src="../../assets/js/bootstrap.min.js"></script>
</body>
</html>