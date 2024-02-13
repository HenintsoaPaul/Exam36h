<?php
  include "static/header.php"
?>
<div class="main">
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
                    <tr>
                        <td> 1 </td>
                        <td> 1 <span class="text-success fw-bold"> ha </span></td>
                        <td>4</td>
                    </tr>
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