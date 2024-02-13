<?php
include "static/header.php";
require_once '../../inc/php/connection.php';
require_once '../../inc/php/crudFuncts/select.php';

$connection = db_connect();
$cueillettes = getAllCueillettes($connection); 
closeConnection($connection);
?>
<div class="main">
        <div class="container">
            <h1>Liste des Cueillettes</h1>
            <table class="table table-hover">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date cueillette</th>
                    <th scope="col">Poids cueilli (Kg)</th>
                    <th scope="col">Parcelle</th>
                    <th scope="col">Cueilleur</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($cueillettes as $cueillette) { ?>
                <tr>
                    <td><?= $cueillette['idCeuillette']?> </td>
                    <td><?= $cueillette['DateCeuillette']?> </td>
                    <td><?= $cueillette['PoidsCeuilli']?> </td>
                    <td><?= $cueillette['idParcelle']?></td>
                    <td><?= $cueillette['idCueilleur']?></td>
                </tr>
                <?php } ?>
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