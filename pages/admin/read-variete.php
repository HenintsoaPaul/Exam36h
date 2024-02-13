<?php
include "static/header.php";
require_once '../../inc/php/connection.php';
require_once '../../inc/php/crudFuncts/select.php';

$connection = db_connect();
$variete = getAllVarietes($connection); 
closeConnection($connection);?>
<div class="main">
        <div class="container">
            <h1>Liste des Varietes</h1>
            <table class="table table-hover">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom Variete</th>
                    <th scope="col">Occupation (m²)</th>
                    <th scope="col">Rendement par pied</th>
                  </tr>
                </thead>
                <tbody>
      <?php     for ($i=0; $i < count($variete) ; $i++) { ?>
                  <tr>
                      <td> <?= $variete[$i]['idVarieteThe']?> </td>
                      <td> <?= $variete[$i]['NomVariete']?> </td>
                      <td> <?= $variete[$i]['Occupation']?> </td>
                      <td><?= $variete[$i]['RendementParPied']?></td>
                  </tr>
    <?php  }?>
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