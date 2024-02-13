<?php
    include "static/header.php";
?>
<script src="../../inc/js/functions.js"></script>
<section id="filtre" class="py-3 bg-light">
    <div class="container">
    <h2>Filtre de resultat</h2>
        <form action="" class=" py-3" id="resultFormulaire">
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
                <button type="submit" class="btn btn-success" id="resultBtn">Voir les resultat</button>
            </div>
        </form>
    </div>
</section>
<section class="my-5" id="main">
    <div class="container d-block" id="nullLayout">
        <div class="row">
            <div class="col-12 text-center">
            <p> Aucun resultat</p>
            </div>
            
        </div>
    </div>
    <div class="container d-none" id="resultLayout"> 
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h3>Poids restants au <span id="dateFinTitle">  </span> </h3>
                        <table class="table" id="parcelleTable">
                            <thead>
                                <tr>
                                    <th>Parcelle</th>
                                    <th>Poids restant</th>
                                </tr>
                            </thead>
                            <tbody id="parcelleTableBody">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6  d-flex flex-column">

                    <div class="card mb-md-3">
                        <div class="card-header">
                        </div>
                        <div class="card-body text-center">
                            <h3>Poids Total Cueilli</h3>
                            <p class="fw-bold fs-3"> <span id="poidsTotal"></span> <span class="text-success">Kg</span></p>
                        </div>
                        <div class="card-footer"></div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                        </div>
                        <div class="card-body text-center">
                            <h3>Couts de revient / Kg</h3>
                            <p class="fw-bold fs-3"> <span id="coutDeRevient"> </span> <span class="text-success">Ar</span></p>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                    
                    <div class="row-lg d-lg-flex mb-3">
                        <div class=" card col-12 col-lg-6">
                            <div class="card-header">
                            </div>
                            <div class="card-body text-center">
                                <h3>Montant des ventes</h3>
                                <p class="fw-bold fs-3">  <span id="montantVentes">  </span> <span class="text-success">Ar</span></p>
                            </div>
                            <div class="card-footer"></div>
                        </div>

                        <div class=" card col-12 col-lg-6">
                            <div class="card-header">
                            </div>
                            <div class="card-body text-center">
                                <h3>Montant des depenses</h3>
                                <p class="fw-bold fs-3">  <span id="montantDepenses">  </span> <span class="text-danger">Ar</span></p>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                    <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body text-center">
                                <h3>Benefice</h3>
                                <p class="fw-bold fs-3">  <span id="benefice">  </span> <span class="text-success">Ar</span></p>
                            </div>
                            <div class="card-footer"></div>
                        </div>
            </div>
        </div>
    </div>
</section>
<script>
    const resultForm = document.getElementById("resultFormulaire");
    const resultLayout = document.getElementById("resultLayout");
    const nullLayout = document.getElementById("nullLayout");
    const dateDebutInput = document.getElementById("dateDebutInput");
    const dateFinInput = document.getElementById("dateFinInput");

    /// Action lors de la validation du formulaire
    resultForm.addEventListener("submit" , function(event){
        event.preventDefault();

        const poidsTotal = document.getElementById("poidsTotal");
        poidsTotal.innerHTML = "0";

        const coutDeRevient = document.getElementById("coutDeRevient");
        coutDeRevient.innerHTML = "0";

        const dateFin = document.getElementById("dateFinTitle");

        const ventes = document.getElementById("montantVentes");
        const depenses = document.getElementById("montantDepenses");
        const benefice = document.getElementById("benefice");

    /// Traitement de donnee
        let poidsCueilli = getPoidsCueilli("getPoidsCueilli.php", dateDebutInput.value, dateFinInput.value);
        let coutRevientPerKilo = getPrixRevient("getPrixRevient.php", dateDebutInput.value, dateFinInput.value);

        let allParcelle = getAllParcelle("get-all-parcelle.php");
        let montantVente = getSommeVente("getSommeVente.php", dateDebutInput.value, dateFinInput.value);
        let valbenefice = getByPeriod("get-benefice.php", dateDebutInput.value, dateFinInput.value);
        let valdepense = getByPeriod("get-depense.php", dateDebutInput.value, dateFinInput.value);

        let tbody = document.getElementById("parcelleTableBody");

        tbody.innerHTML = "";
        for (let index = 0; index < allParcelle.length; index++) {

            let parcelle = allParcelle[index];
            let reste = getPoidsRestants("getReste.php", dateDebutInput.value, dateFinInput.value,parcelle.idParcelle);

            let tr = document.createElement("tr");

            let td_idParcelle = document.createElement("td");
            let td_reste = document.createElement("td");
            
            td_idParcelle.innerHTML = parcelle.idParcelle;
            td_reste.innerHTML = reste;

            tr.appendChild(td_idParcelle);
            tr.appendChild(td_reste);

            tbody.appendChild(tr);
        }
    ///

    /// Affichage de resultat
        if (poidsCueilli !== "") poidsTotal.innerHTML = poidsCueilli;
        if(coutRevientPerKilo !== "undefined") coutDeRevient.innerHTML = coutRevientPerKilo;

        ventes.innerHTML = montantVente;
        depenses.innerHTML = valdepense;
        benefice.innerHTML = valbenefice;
    
        dateFin.innerHTML = document.getElementById("dateFinInput").value;
        nullLayout.classList.replace("d-block" , "d-none");
        resultLayout.classList.replace("d-none" , "d-block");
    });
</script>
<script>
    activeCurrentPage("resultat_li");
</script>
<?php
    include "static/footer.php";
?>