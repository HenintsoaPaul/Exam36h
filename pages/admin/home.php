<?php
  include "static/header.php"
?>
    <section class="py-5" id="main">
        
        <div class="container">
          <div class="row gy-4 gy-md-0">
            <div class="col-12 text-center">
              <h1 class="fw-bold">
                Welcome to the admin page
              </h1>
              <p class="fw-light">Dans cette partie vous allez pouvoir administer les 
                <a href="insertion-variete.php" class="link">Varietes</a> ,
                <a href="insertion-parcelle.php" class="link">Parcelles</a> ,
                <a href="insertion-cueilleur.php" class="link">Cueilleurs</a> ,
                <a href="insertion-categorie.php" class="link">Categorie</a>
                <a href="insertion-salaire.php" class="link">Salaire</a>
              </p>
          </div>
        </div>
      </section>

      <script>
        activeCurrentPage("admin_li")
      </script>
<?php
  include "static/footer.php"
?>