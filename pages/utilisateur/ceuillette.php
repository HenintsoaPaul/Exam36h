<?php
include "static/header.php";
require_once '../../inc/php/connection.php';
require_once '../../inc/php/crudFuncts/select.php';

$connection = db_connect();
$parcelles = getAllParcelles($connection);
$cueilleurs = getAllCueilleurs($connection); 
closeConnection($connection);

$className = "";
$insertLog = "";
if ( isset($_GET['message']) ) {
    $className = $_GET['message'] == "success" ? "success" : "danger";
    $insertLog = $_GET['message'] == "success" ? "Insertion reussie!" : "Oops! Insertion echouee.";
}
?>
<script src="../../inc/js/functions.js"></script>

<section class="my-5" id="main">
    <div class="container ">
        <div class="row gy-4  gy-md-0">
            <form class="col-12 col-lg-6 d-flex border-3 flex-column justify-content-center " action="AddCueillette.php" method="POST">
                <div class="h1 text-center"> Faire une cueillette </div>
                <div class="bg-dark p-1 w-100 my-2"></div>

                <p class="text-<?= $className ?>" id="insertLog"><?= $insertLog ?></p>

                <p class="text-danger" id="errorLabel" style="display:none;"> Le poids est trop grand</p>

                <div class="form-group mb-3">
                    <label for="dateInput" class="form-label">Date de cueillette</label>
                    <input type="date" class="form-control" id="dateInput" required name="date"> 
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 "> 
                        <label for="parcelleInput" class="form-label">Parcelle</label>
                        <select name="parcelleInput" class="form-select" id="parcelleInput">
                            <option value="">Choisir une parcelle</option>
                            <?php foreach ($parcelles as $parcelle) { ?>
                                <option value="<?= $parcelle['idParcelle'] ?>"> <?= $parcelle['idParcelle'] ?> </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="poidsInput" class="form-label">Poids Cueillit (Kg)</label>
                        <input type="text" name="poidsInput" class="form-control" id="poidsInput" required>
                    </div>
                    <div class="col-md-6 ">
                        <label for="cueilleurInput" class="form-label">Ceuilleur</label>
                        <select name="ceuilleurInput" class="form-select" id="ceuilleurInput">
                            <option value="">Choisir un cueilleur</option>
                            <?php foreach ($cueilleurs as $cueilleur) { ?>
                                <option value="<?= $cueilleur['idCeuilleur'] ?>"><?= $cueilleur['Nom'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="d-inline">
                    <button type="submit" class="btn btn-success" id="btn-submit">Ceuillir</button>
                </div>
                
            </form>
            <div class="col-12 col-md-6 d-none d-lg-flex justify-content-end ">
                <img src="../../assets/img/baby-picker.jpg" class="w-100 rounded-3 shadow-lg" alt="image portrait" />
            </div>
        </div>
    </div>
</section>

<script>
    const poidsInput = document.getElementById("poidsInput") ;
    const parcelleInput = document.getElementById("parcelleInput");
    const dateInput = document.getElementById("dateInput");

    poidsInput.addEventListener("input" , function() {
    // la valeur saisie
        const idParcelle = parcelleInput.value;
        const date = dateInput.value;
        const poidsRestant = getRestePoids("getPoidsRestant.php", date, idParcelle);

        const poids = poidsInput.value;
        console.log(poids);

        const divErreur = document.getElementById("errorLabel");
        const btnSubmit = document.getElementById("btn-submit");
        document.getElementById("insertLog").style.display = "none";

        divErreur.style.display = poidsRestant < poids ? "block" : "none";
        if (poidsRestant < poids) btnSubmit.classList.add("disabled");
        else btnSubmit.classList.remove("disabled");
    });

    activeCurrentPage("ceuillette_li")
</script>

<?php
    include "static/footer.php";
?>