<?php
include "static/header.php";
?>
<section class="my-5" id="main">
    <div class="container ">
        <div class="row gy-4  gy-md-0">
            <form class="col-12 col-lg-6 d-flex border-3 flex-column justify-content-center ">
                <div class="h1 text-center"> Faire une ceuillette </div>
                <div class="bg-dark p-1 w-100 my-2"></div>
                <div class="form-group mb-3">
                    <label for="dateInput" class="form-label">Date de ceuillette</label>
                    <input type="date" class="form-control" id="dateInput" required>
                </div>    
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="poidsInput" class="form-label">Poids Ceuilli</label>
                        <input type="text" name="poidsInput" class="form-control" id="poidsInput" required>
                    </div>
                    <div class="col-md-6 ">
                        <label for="parcelleInput" class="form-label">Parcelle</label>
                        <select name="parcelleInput" class="form-select" id="parcelleInput">
                            <option value="">Choisir une parcelle</option>
                            <option value="1"> P1 </option>
                            <option value="2"> P2 </option>
                            <option value="3"> P3 </option>
                        </select>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-success">Ceuillir</button>
                </div>
            </form>
            <div class="col-12 col-md-6 d-none d-lg-flex justify-content-end">
                <img src="../../assets/img/baby-picker.jpg" class="w-100" alt="image portrait" />
            </div>
        </div>
    </div>
</section>