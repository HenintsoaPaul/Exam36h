<?php
include "static/header.php";
?>
<section class="my-5" id="main">
    <div class="container ">
        <div class="row gy-4  gy-md-0">
            <form class="col-12 col-lg-6 d-flex border-3 flex-column justify-content-center ">
                <div class="h1 text-center"> Faire une ceuillette </div>
                <div class="bg-dark p-1 w-100 my-2"></div>
                <p class="text-danger" id="errorLabel"> Le poids est trop grand</p>
                <div class="form-group mb-3">
                    <label for="dateInput" class="form-label">Date de ceuillette</label>
                    <input type="date" class="form-control" id="dateInput" required>
                </div>    
                <div class="row mb-3">
                    <div class="col-md-6 ">
                        <label for="parcelleInput" class="form-label">Parcelle</label>
                        <select name="parcelleInput" class="form-select" id="parcelleInput">
                            <option value="">Choisir une parcelle</option>
                            <option value="1"> P1 </option>
                            <option value="2"> P2 </option>
                            <option value="3"> P3 </option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        
                        <label for="poidsInput" class="form-label"> Poids Ceuilli</label>
                        <input type="text" name="poidsInput" class="form-control" id="poidsInput" required>
                    </div>
                    <div class="col-md-6 ">
                        <label for="ceuilleurInput" class="form-label">Ceuilleur</label>
                        <select name="ceuilleurInput" class="form-select" id="ceuilleurInput">
                            <option value="">Choisir un ceuilleur</option>
                            <option value="1"> P1 </option>
                            <option value="2"> P2 </option>
                            <option value="3"> P3 </option>
                        </select>
                    </div>
                </div>
                <div class="d-inline">
                    <button type="submit" class="btn btn-success">Ceuillir</button>
                </div>
                
            </form>
            <div class="col-12 col-md-6 d-none d-lg-flex justify-content-end ">
                <img src="../../assets/img/baby-picker.jpg" class="w-100 rounded-3" alt="image portrait" />
            </div>
        </div>
    </div>
</section>

<script>
    var poidsInput = document.getElementById("poisInput") ;
    poidsInput.addEventListener("input" , function() {
    /// la valeur saisie
        var poids = poidsInput.value;
    });

</script>
<?php
include "static/footer.php";
?>