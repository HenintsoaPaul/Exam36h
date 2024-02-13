<?php
include "static/header.php";
require_once '../../inc/php/connection.php';
require_once '../../inc/php/crudFuncts/select.php';

$connection = db_connect();
$parcelles = getAllParcelles($connection); 
closeConnection($connection);?>
<div class="main">
        <div class="container">
            <h1>Liste des Salaires</h1>
            <table class="table table-hover">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Montant salaire</th>
                    <th scope="col">Date de debut salaire</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> 1 </td>
                        <td> 1500</td>
                        <td>-- / -- / --</td>
                    </tr>
                </tbody>
              </table>
        </div>
    </div>
    <script>
        activeCurrentPage("salaire_li")
    </script>
<?php
include "static/footer.php";
?>