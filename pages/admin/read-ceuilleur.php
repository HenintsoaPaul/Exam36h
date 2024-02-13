<?php
include "static/header.php";
require_once '../../inc/php/connection.php';
require_once '../../inc/php/crudFuncts/select.php';

$connection = db_connect();
$cueilleurs = getAllCueilleurs($connection); 
closeConnection($connection);?>
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
    <?php       for($i=0;$i<count($cueilleurs); $i++) {?> 
                    <tr>
                        <td><?= $cueilleurs[$i]['idCeuilleur']?> </td>
                        <td><?= $cueilleurs[$i]['Nom']?></td>
                        <td><?= $cueilleurs[$i]['DateNaissance']?></td>
                        <td><?= $cueilleurs[$i]['idGenre']?></td>
                    </tr>
      <?php }?>
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