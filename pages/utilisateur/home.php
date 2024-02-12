<?php
    include"static/header.php";
?>
<section class="my-5" id="main">
        <div class="container">
          <div class="row gy-4 gy-md-0">
            <div class="col-12 col-md-6 d-flex flex-column justify-content-center ">
              <h1 class="fw-bold">
                Welcome to the User Page
              </h1>
              <p class="fw-light">
                Bienvenue dans la grande famille des ceuilleur , dans cette section vous pouvez vous epanouir en tant que tel.
                Vous pourez <a href="ceuillette.php" class="link">faire des ceuillettes</a> , enregistrer <a href="depense.php" class="link">depenses</a> et voir <a href="resultats.php" class="link">les resultats</a> 
              </p>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-end">
              <img
                src="../../assets/img/tea-hand.jpg"
                class="w-100 rounded-3 shadow-lg"
                alt="image portrait"
              />
            </div>
          </div>
        </div>
      </section>
      <script>
        activeCurrentPage("userHome_li");
    </script>
<?php
    include"static/footer.php";
?>