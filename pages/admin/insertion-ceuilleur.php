<?php
  include "static/header.php"
?>
    <div class="main m-5">
        <div class="container">
            <div class="row">
                <form action="" method="post" id="insertionForm" class="col-12 col-md-6 mx-auto">
                <div class="card p-5 rounded border-3">        
                <h1>Ceuilleur</h1>
                    <!-- Nom -->
                    <div class="form-group col-md-12">
                        <label for="nomInput">Nom Ceuilleur</label>
                        <input class="form-control" type="text" name="nomInput" id="nomInput" required>
                    </div>
                    <div class="row">
                        <!-- Date de naissance -->
                        <div class="form-group col-md-6"> 
                            <label for="naissanceInput">Daet de naissance</label>
                            <input class="form-control" type="date" name="naissanceInput" required id="naissanceInput">
                        </div>
                        <!-- GENRE-->
                        <div class="form-group col-md-6"> 
                            <label for="genreInput">Genre</label>
                            <select name="genreInput" title="genre" class="form-select" required >
                                <option value="#">Choisir votre genre </option>
                                <option value="1">Masculin</option>
                                <option value="2">Feminin</option>
                                <option value="3">Non-binaire</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success mt-3">New Ceuilleur</button>
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