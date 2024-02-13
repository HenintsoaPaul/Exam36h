<?php
  include "static/header.php"
?>
<div class="main">
        <div class="container">
            <h1>Liste des Varietes</h1>
            <table class="table table-hover">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom Variete</th>
                    <th scope="col">Ocuupation</th>
                    <th scope="col">Rendement par pied</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> 1 </td>
                        <td> Jaune </td>
                        <td> 18.2</td>
                        <td>160</td>
                    </tr>
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