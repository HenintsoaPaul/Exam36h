<?php
include "static/header.php";
require_once '../../inc/php/connection.php';
include '../../inc/php/crudFuncts/select.php';
$connection = db_connect();
$parcelles = getAllParcelles($connection);
$cueilleurs = getAllCueilleurs($connection); 
closeConnection($connection); 
?>
<script src="../../inc/js/functions.js"></script>
<section class="my-5" id="main">
    <div class="container ">
        <div class="row gy-4  gy-md-0">
            <form class="col-12 col-lg-6 d-flex border-3 flex-column justify-content-center " action="AddCueillette.php" method="POST">
                <div class="h1 text-center"> Faire une cueillette </div>
                <div class="bg-dark p-1 w-100 my-2"></div>
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
        <?php               for ($i=0; $i < count($parcelles) ; $i++) { ?>
                                <option value="<?php echo $parcelles[$i]['idParcelle'];?>"> <?php echo $parcelles[$i]['idParcelle'];?> </option>
        <?php   }?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="poidsInput" class="form-label">Poids Cueillit</label>
                        <input type="text" name="poidsInput" class="form-control" id="poidsInput" required>
                    </div>
                    <div class="col-md-6 ">
                        <label for="cueilleurInput" class="form-label">Ceuilleur</label>
                        <select name="ceuilleurInput" class="form-select" id="ceuilleurInput">
                            <option value="">Choisir un cueilleur</option>
            <?php   for($i=0;$i<count($cueilleurs);$i++){?>
                            <option value="<?php echo $cueilleurs[$i]['idCeuilleur'];?>"><?php echo $cueilleurs[$i]['Nom'];?></option>
        <?php       }?>
                        </select>
                    </div>
                </div>
                <div class="d-inline">
                    <button type="submit" class="btn btn-success">Ceuillir</button>
                </div>
                
            </form>
            <div class="col-12 col-md-6 d-none d-lg-flex justify-content-end ">
                <img src="../../assets/img/baby-picker.jpg" class="w-100 rounded-3 shadow-lg" alt="image portrait" />
            </div>
        </div>
    </div>
</section>

<script>
    var poidsInput = document.getElementById("poidsInput") ;
    var parcelleInput = document.getElementById("parcelleInput");
    poidsInput.addEventListener("input" , function() {
    /// la valeur saisie
        var idParcelle = parcelleInput.value;
        var poids = poidsInput.value;
        var poidsRestant = send("getPoidsRestant.php", idParcelle, "idParcelle");
        if(poidsRestant < poids){
            var divErreur = document.getElementById("errorLabel");
            divErreur.style.display = "block";
        } else{
            var divErreur = document.getElementById("errorLabel");
            divErreur.style.display = "none";
        }
    });
</script>
<?php
include "static/footer.php";
?>