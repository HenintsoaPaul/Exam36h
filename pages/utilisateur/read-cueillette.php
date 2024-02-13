<?php
include "static/header.php";
require_once '../../inc/php/connection.php';
require_once '../../inc/php/crudFuncts/select.php';

$connection = db_connect();
$cueillettes = getAllCueillettes($connection); 
closeConnection($connection);?>
<div class="main">
        <div class="container">
            <h1>Liste des Varietes</h1>
            <table class="table table-hover">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date cueillette</th>
                    <th scope="col">Poids cueilli</th>
                    <th scope="col">Parcelle</th>
                    <th scope="col">Cueilleur</th>
                  </tr>
                </thead>
                <tbody>
    <?php for ($i=0; $i < count($cueillettes) ; $i++) { ?>
                <tr>
                    <td> <?= $cueillettes[$i]['idCeuillette']?> </td>
                    <td> <?= $cueillettes[$i]['DateCeuillette']?> </td>
                    <td> <?= $cueillettes[$i]['PoidsCeuilli']?> </td>
                    <td><?= $cueillettes[$i]['idParcelle']?></td>
                    <td><?= $cueillettes[$i]['idCeuilleur']?></td>
                </tr>
    <?php }?>
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