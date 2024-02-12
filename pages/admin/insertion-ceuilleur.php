<?php
  include "static/header.php";
  require_once '../../inc/php/connection.php';
  include '../../inc/php/crudFuncts/select.php';
   $connection = db_connect();
  $genres = getAllGenre($connection);
  closeConnection($connection);
  echo(count($genres));
?>
    <div class="main m-5">
        <div class="container">
            <div class="row">
                <form action="traitements/addCueilleur.php" method="post" id="insertionForm" class="col-12 col-md-6 mx-auto">
                    <h1>Cueilleur</h1>
                    <!-- Nom -->
                    <div class="form-group col-md-12">
                        <label for="nomInput">Nom Cueilleur</label>
                        <input class="form-control" type="text" name="nomInput" id="nomInput" required>
                    </div>
                    <div class="row">
                        <!-- Date de naissance -->
                        <div class="form-group col-md-6"> 
                            <label for="naissanceInput">Date de naissance</label>
                            <input class="form-control" type="date" name="naissance" required id="naissanceInput">
                        </div>
                        <!-- GENRE-->
                        <div class="form-group col-md-6"> 
                            <label for="genreInput">Genre</label>
                            <select name="genreInput" title="genre" class="form-select" required >
                                <option value="#">Choisir votre genre </option>
                <?php           for($i=0;$i<count($genres);$i++){?>
                                <option value="<?php echo $genres[$i]['idGenre'];?>"><?php echo $genres[$i]['NomGenre'];?></option>
 
                <?php   }   ?>
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