<?php
    include "static/header.php";
?>
<script src="../../inc/js/functions.js"></script>
<section id="filtre" class="py-3 bg-light">
    <div class="container">
    <h2>Filtre de paiement</h2>
        <form action="" class=" py-3" id="paiementFormulaire">
            <div class="row mb-3">
                <label for="dateDebutInput" class="form-label col-12 col-md-2 text-center">Date de debut</label>
                <div class="col-md-3 col-12">
                    <input type="date" id="dateDebutInput" class="form-control col-3" required>
                </div>
            </div>
            <div class="row">
                <label for="dateFinInput" class="form-label col-12 col-md-2 text-center">Date de fin</label>
                <div class="col-md-3 col-12">
                    <input type="date" id="dateFinInput" class="form-control col-3" required>
                </div>
            </div> 
            <div>
                <button type="submit" class="btn btn-success" id="resultBtn">Voir les paiements</button>
            </div>
        </form>
    </div>
</section>
<section class="my-5" id="main">
    <div class="container d-block" id="nullLayout">
        <div class="row">
            <div class="col-12 text-center">
                <p> Aucun paiement </p>
            </div>
        </div>
    </div>
    <div class="container d-none" id="paiementLayout"> 
        <div class="row">
            <div class="col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <h3>Liste des paiements<span id="dateFinTitle">  </span> </h3>
                        <table class="table" id="paiementTable">
                            <thead>
                                <tr>
                                    <th>Date cueillette</th>
                                    <th>Nom cueilleur</th>
                                    <th>Poids cueilli</th>
                                    <th>%Bonus</th>
                                    <th>%Mallus</th>
                                    <th>Montant paiement</th>
                                </tr>
                            </thead>
                            <tbody id="paiementTableBody">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var paiementForm = document.getElementById("paiementFormulaire");
    var paiementLayout = document.getElementById("paiementLayout");
    var nullLayout = document.getElementById("nullLayout");
/// Les champs dates de filtre
    var dateDebutInput = document.getElementById("dateDebutInput");
    var dateFinInput = document.getElementById("dateFinInput");
/// Action lors de la validation du formulaire
    paiementForm.addEventListener("submit" , function(event){
        event.preventDefault();
    /// Traitement de donnee
        var data = getData("get-all-cueilleurs.php");
        var tbody = document.getElementById("paiementTableBody");
        tbody.innerHTML = "";
        for (let index = 0; index < data.length; index++) {

            const chunk = data[index];
            const paiementChunk = getPaiement("get-paiement.php",chunk.idCueilleur,dateDebutInput.value,dateFinInput.value);
            var tr = document.createElement("tr");
        /// Recuperration des valeurs necessaire
            const dateCueillette = dateFinInput.value;
            const nomCueilleur = chunk.Nom;
            const poids = getInfoCueilleur("get-poids-cueilli.php", chunk.idCueilleur,dateDebutInput.value,dateFinInput.value);
            const bonus = getInfoCueilleur("get-total-bonus.php", chunk.idCueilleur,dateDebutInput.value,dateFinInput.value);
            const mallus = getInfoCueilleur("get-total-mallus.php", chunk.idCueilleur,dateDebutInput.value,dateFinInput.value);
            const montantPaiement = paiementChunk;

        /// Creation des  membres du tableau
            var td_dateCueillette = document.createElement("td");
            td_dateCueillette.textContent = dateCueillette;
            tr.appendChild(td_dateCueillette);

            var td_nomCueilleur = document.createElement("td");
            td_nomCueilleur.textContent = nomCueilleur;
            tr.appendChild(td_nomCueilleur);

            var td_poids = document.createElement("td");
            td_poids.textContent = poids;
            tr.appendChild(td_poids);

            var td_bonus = document.createElement("td");
            td_bonus.textContent = bonus;
            tr.appendChild(td_bonus);

            var td_mallus = document.createElement("td");
            td_mallus.textContent = mallus;
            tr.appendChild(td_mallus);

            var td_montantPaiement = document.createElement("td");
            td_montantPaiement.textContent = montantPaiement;
            tr.appendChild(td_montantPaiement);

            tbody.appendChild(tr);
        }
    ///

    /// Affichage de resultat
        nullLayout.classList.replace("d-block" , "d-none");
        paiementLayout.classList.replace("d-none" , "d-block");
    });
</script>
<script>
    activeCurrentPage("paiements_li");
</script>
<?php
    include"static/footer.php";
?>