<?php
include "static/header.php";
?>
<section class="my-5" id="main">
    <div class="container ">
        <div class="row gy-4  gy-md-0">
            <form class="col-12 col-lg-6 d-flex border-3 flex-column justify-content-center ">
                <div class="h1 text-center"> Enregitrer une depense </div>
                <div class="bg-dark p-1 w-100 my-2"></div>
                <div class="form-group mb-3">
                    <label for="dateInput" class="form-label">Date depense</label>
                    <input type="date" class="form-control" id="dateInput" required>
                </div>    
                <div class="row mb-3">
                <div class="col-md-6">
                        <label for="montantInput" class="form-label">Montant de depense</label>
                        <input type="text" name="montantInput" class="form-control" id="montantInput" required>
                    </div>
                    <div class="col-md-6 ">
                        <label for="categorieInput" class="form-label">Categorie</label>
                        <select name="categorieInput" class="form-select" id="categorieInput">
                            <option value="">Choisir une categorie de depense</option>
                            <option value="1"> C1 </option>
                            <option value="2"> C2 </option>
                            <option value="3"> C3 </option>
                        </select>
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
</section>
<?php
include "static/footer.php";
?>