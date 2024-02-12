<?php 
 require_once '../../inc/php/connection.php';
 require_once '../../inc/php/crudFuncts/create.php';
 require_once '../../inc/php/crudFuncts/select.php';
 $connection = db_connect();
 $date = $_POST['date'];
 $poids = $_POST['poidsInput'];
 $parcelle = $_POST['parcelleInput']; 
 $idCueilleur = $_POST['ceuilleurInput'];
 $link = "ceuillette.php?message";

 addCueillette($connection, $date, $poids, $parcelle, $idCueilleur);
 $message = $nbRowsAdded === 1 ? "success" : "failed";
header("Location:$link=$message");

?>