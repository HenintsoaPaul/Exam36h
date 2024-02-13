<?php
include "static/header.php";
require_once '../../inc/php/connection.php';
require_once '../../inc/php/crudFuncts/select.php';

$connection = db_connect();
$parcelles = getAllParcelles($connection); 
closeConnection($connection);?>
<div class="main min-height-style">
        <div class="container">
            <h1>Liste des Parcelles</h1>
            <table class="table table-hover">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Surface</th>
                    <th scope="col">Variete</th>
                  </tr>
                </thead>
                <tbody>
        <?php   for ($i=0; $i <count($parcelles); $i++) {?>
                    <tr>
                        <td><?= $parcelles[$i]['idParcelle']?></td>
                        <td> <?= $parcelles[$i]['Surface']?><span class="text-success fw-bold"> ha </span></td>
                        <td><?= $parcelles[$i]['idVarieteThe']?></td>
                    </tr>
        <?php  }?>
                </tbody>
              </table>
        </div>
    </div>
    <script>
        activeCurrentPage("parcelle_li")
    </script>
<?php
include "static/footer.php";
?>