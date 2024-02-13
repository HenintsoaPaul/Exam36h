<?php 
    include "static/header.php"
?>
<section id="main" class=" min-height-style">
    <div class="container mb-3">
        <div class="text-center h1 text-uppercase">Prevision</div>
        <form action="">
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
            <div class="col-12"><p class="p-1"> Poids de the restant : <span id="montantLabel"> 330 <b class="text-success">kg</b> </span></p></div>
            <div class="col-12"><p class="p-1"> Montant : <span id="montantLabel"> 1 549 000 <b class="text-success">Ar</b></span></p></div>
        </div>
    </div>
    <div class="container mb-3">

        <div class="row gy-3">
            <!-- #1 -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="row text-center">
                                <div class="col-6">Parcelle #</div>
                                <div class="col-6">10 ha</div>
                            </div>
                        </div>
                        <div class="text-center text-success fw-bold  fs-3 p-1">The Variete</div>
                        <img src="../../assets/img/green-tea.jpg" alt="" class="img-fluid">
                        <div class="row mb-3">
                            <div class="col-12 p-2">
                                <!-- Nombre de pied -->
                                Nomre de pied : <spna> 62</spna>
                            </div>
                            <div class="col-12 p-2">
                                <!-- Poids de the restant -->
                                Poids de the restant : <span>300 kg</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #2 -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="row text-center">
                                <div class="col-6">Parcelle #</div>
                                <div class="col-6">10 ha</div> 
                            </div>
                        </div>
                        <div class="text-center text-success fw-bold  fs-3 p-1">The Variete</div>
                        <img src="../../assets/img/green-tea.jpg" alt="" class="img-fluid">
                        <div class="row mb-3">
                            <div class="col-12 p-2">
                                <!-- Nombre de pied -->
                                Nomre de pied : <spna> 62</spna>
                            </div>
                            <div class="col-12 p-2">
                                <!-- Poids de the restant -->
                                Poids de the restant : <span>300 kg</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #3 -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="row text-center">
                                <div class="col-6">Parcelle #</div>
                                <div class="col-6">10 ha</div>
                            </div>
                        </div>
                        <div class="text-center text-success fw-bold  fs-3 p-1">The Variete</div>
                        <img src="../../assets/img/green-tea.jpg" alt="" class="img-fluid">
                        <div class="row mb-3">
                            <div class="col-12 p-2">
                                <!-- Nombre de pied -->
                                Nomre de pied : <spna> 62</spna>
                            </div>
                            <div class="col-12 p-2">
                                <!-- Poids de the restant -->
                                Poids de the restant : <span>300 kg</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
        </div>
    </div>
</section>
<?php 
    include "static/footer.php"
?>