<?php
  include "static/header.php"
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
                    <tr>
                        <td> 1 </td>
                        <td> Anarana </td>
                        <td>--/--/--</td>
                        <td>Masculin</td>
                    </tr>
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