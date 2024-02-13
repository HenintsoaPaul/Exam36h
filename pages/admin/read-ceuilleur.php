<?php
include "static/header.php";
require_once '../../inc/php/connection.php';
require_once '../../inc/php/crudFuncts/select.php';

$connection = db_connect();
$cueilleurs = getAllCueilleurs($connection);
closeConnection($connection);
?>
<div class="main">
        <div class="container">
            <h1>Liste des Cueilleurs</h1>
            <table class="table table-hover">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Date de naissance</th>
                    <th scope="col">Genre</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach ($cueilleurs as $cueilleur) { ?>
                    <tr>
                        <td><?= $cueilleur['idCueilleur'] ?> </td>
                        <td><?= $cueilleur['Nom'] ?></td>
                        <td><?= $cueilleur['DateNaissance'] ?></td>
                        <td><?= $cueilleur['idGenre'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
              </table>
        </div>
    </div>
    <script>
        activeCurrentPage("ceuilleur_li")
    </script>
<?php
include "static/footer.php";
?>