<?php 
 require_once '../../inc/php/connection.php';
 require_once '../../inc/php/crudFuncts/create.php';
 require_once '../../inc/php/crudFuncts/select.php';
 $connection = db_connect();
 $date = $_POST['dateInput'];
 $categ = $_POST['categorieInput'];
 $montant = $_POST['montantInput'];
 $link = "depense.php?message";

 addDepense($connection, $date, $montant, $categ);
 $message = $nbRowsAdded === 1 ? "success" : "failed";
header("Location:$link=$message");

?>