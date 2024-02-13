<?php 
    include "static/header.php"
?>
<section id="main" class=" min-height-style">
    <div class="container mb-3">
        <div class="text-center h1 text-uppercase">Prevision</div>
        <form action="" id="previsionForm">
        <div class="form-group row gap-3">
            <label for="dateInput" class="col-sm-1 col-form-label">Date</label>
            <div class="col ">
                <input type="date" class="form-control" name="dateInput" id="dateInput" >
            </div>
            <div class="col-sm-3 text-center">
                <button type="submit" class="btn btn-success">Valider</button>
            </div>
        </div>
        </form>
    </div>
    <div class="bg-light">
        <div class="bg-light container text-center">
            <div class="col-12"><p class="p-1"> Poids de the restant : <span id="poidsLabel"> 0  </span></p></div>
            <div class="col-12"><p class="p-1"> Montant : <span id="montantLabel"> 0 </span></p></div>
        </div>
    </div>
    <div class="container mb-3">
    <div class="container d-block" id="nullLayout">
        <div class="row">
            <div class="col-12 text-center">
                <p> Aucune prevision </p>
            </div>
        </div>
    </div>
        <div class="row gy-3 d-none " id="previsionLayout">
            <!-- #1 -->
            
            <!--  -->
        </div>
    </div>
</section>
<script>
    var previsionForm = document.getElementById("previsionForm");
    var previsionLayout = document.getElementById("previsionLayout");
    var nullLayout = document.getElementById("nullLayout");
/// Les champs dates de filtre
    var date = document.getElementById("dateInput");

    

    var montantTotal = document.getElementById("montantLabel");
    var poidsTotal = document.getElementById("poidsLabel");
/// Action lors de la validation du formulaire
    previsionForm.addEventListener("submit" , function(event){
        event.preventDefault();
    /// Traitement de donnee
        var montantprev = getPredictionMontant("get-prediction-montant.php", date.value);
        var poidsprev = getPredictionPoids("get-prediction-poids.php", date.value);
        
        var sumpoids = 0;
        var summont = 0;
        var data =  getAllParcelle("get-all-parcelle.php");
        previsionLayout.innerHTML = "";
        for (let index = 0; index < data.length; index++) {

            const chunk = data[index];

            const numParcelle = chunk.idParcelle;
            const surfaceParcelle = chunk.Surface;
            const nomVariete = chunk.idVarieteThe;
            const nbDePied = "---";
            // const poidsRestant = poidsprev[index];
            summont += montantprev[chunk.idParcelle];

            var html = "<div class=\"col-12 col-md-6 col-lg-4\"><div class=\"card\"><div class=\"card-body\"><div class=\"card-title\"><div class=\"row text-center\"><div class=\"col-6\">Parcelle "+numParcelle+"</div><div class=\"col-6\">Surface : "+surfaceParcelle+"</div></div></div><div class=\"text-center text-success fw-bold  fs-3 p-1\">"+nomVariete+"</div><img src=\"../../assets/img/green-tea.jpg\" alt=\"\" class=\"img-fluid\"><div class=\"row mb-3\"><div class=\"col-12 p-2\">Nomre de pied : <spna>"+nbDePied+"</spna></div><div class=\"col-12 p-2\">Poids de the restant : <span>"+poidsRestant+" kg</span></div></div></div></div></div>";
            previsionLayout.innerHTML += html;
        }
    ///
    montantTotal.innerHTML = summont;
    poidsTotal.innerHTML = ;
    /// Affichage de resultat
        nullLayout.classList.replace("d-block" , "d-none");
        previsionLayout.classList.replace("d-none" , "d-block");
    });
</script>
<?php 
    include "static/footer.php"
?>