<?php
  include "static/header.php"
?>
<?php if (isset($_GET['message'])) { ?>
    <script> alert("<?php echo $_GET['message'] ?>");</script>
<?php }?>

    <div class="main m-5">
        <div class="container">
            <div class="row">
                <form action="traitements/addVariete.php" method="POST" id="insertionForm" class="col-12 col-md-6 mx-auto">
                <div class="card p-5 rounded border-3">    
                <h1>Variete de the</h1>
                    <!-- Nom -->
                    <div class="form-group col-md-12">
                        <label for="nomVariete">Nom Variete</label>
                        <input class="form-control" type="text" name="nomVariete" id="nomVariete" required>
                    </div>
                    <div class="row">
                        <!-- OCCUPATION -->
                        <div class="form-group col-md-6"> 
                            <label for="occupation">Occupation</label>
                            <input class="form-control" type="text" name="occupation" id="occupation" required>
                        </div>
                        <!-- Rendement par pied -->
                        <div class="form-group col-md-6"> 
                            <label for="rendement">Rendement par pied</label>
                            <input class="form-control" type="text" name="rendement" id="rendement" required>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success mt-3">Add New Variete</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br />
    <?php
include "static/footer.php";
?>