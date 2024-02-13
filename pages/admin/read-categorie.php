<?php
include "static/header.php";
require_once '../../inc/php/connection.php';
require_once '../../inc/php/crudFuncts/select.php';

$connection = db_connect();
$categ = getAllCategoriesDepenses($connection); 
closeConnection($connection);
?> 
<div class="main min-height-style">
        <div class="container">
            <h1>Liste des Categories de depense</h1>
            <table class="table table-hover">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom Categorie</th>
                  </tr>
                </thead>
                <tbody>
    <?php     for ($i=0; $i < count($categ); $i++) { ?>
                  <tr>
                      <td> <?= $categ[$i]['idCategorieDepense']?> </td>
                      <td> <?= $categ[$i]['NomCategorie']?></td>
                  </tr>
    <?php    }?>
                </tbody>
              </table>
        </div>
    </div>
    <script>
        activeCurrentPage("variete_li")
      </script>
<?php
include "static/footer.php";
?>