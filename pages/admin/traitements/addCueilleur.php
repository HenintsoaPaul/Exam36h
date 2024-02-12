<?php
require_once '../../../inc/php/connection.php';
require_once '../../../inc/php/crudFuncts/create.php';


$link = "../insertion-ceuilleur.php?message";


$dtn = $_POST['naissance'];
$nom = $_POST['nomInput'];
$genre = $_POST['genreInput'];




// exe query
$connection = db_connect();
$nbRowsAdded = addCueilleur( $connection, $nom, $dtn, $genre );
closeConnection( $connection );

// redirection
$message = $nbRowsAdded === 1 ? "success" : "failed";
header("Location:$link=$message");

?>