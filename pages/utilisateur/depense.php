<?php 
include "static/header.php";
require_once '../../inc/php/connection.php';
include '../../inc/php/crudFuncts/select.php';
$connection = db_connect();
$categories = getAllCategoriesDepenses($connection);
closeConnection($connection);

?>
<section class="my-5" id="main">
    <div class="container ">
        <div class="row gy-4  gy-md-0">
            <form action="AddDepense.php" method="post" class="col-12 col-lg-6 d-flex border-3 flex-column justify-content-center ">
                <div class="h1 text-center"> Enregitrer une depense </div>
                <div class="bg-dark p-1 w-100 my-2"></div>
                <div class="form-group mb-3">
                    <label for="dateInput" class="form-label">Date depense</label>
                    <input type="date" class="form-control" id="dateInput" name="dateInput" required>
                </div>    
                <div class="row mb-3">
                    <div class="col-md-6 ">
                        <label for="categorieInput" class="form-label">Categorie</label>
                        <select name="categorieInput" class="form-select" id="categorieInput">
                            <option value="">Choisir une categorie de depense</option>
            <?php       for($i=0;$i<count($categories); $i++){?>
                            <option value="<?php echo $categories[$i]['idCategorieDepense'];?> "><?php echo $categories[$i]['NomCategorie'];?></option>
                <?php    }?>
                        </select>
                    </div>
                <div class="col-md-6">
                        <label for="montantInput" class="form-label">Montant de depense</label>
                        <input type="text" name="montantInput" class="form-control" id="montantInput" required>
                    </div>
                    
                </div>
                <div>
                    <button type="submit" class="btn btn-success">Valider Depense</button>
                </div>
            </form>
            <div class="col-12 col-md-6 d-none d-lg-flex justify-content-end">
                <img src="../../assets/img/spend-money.jpg" class="img-fluid rounded-3 shadow-lg" alt="image portrait" />
            </div>
        </div>
    </div>
    <script>
        activeCurrentPage("depense_li");
    </script>
</section>
<?php
include "static/footer.php";
?>