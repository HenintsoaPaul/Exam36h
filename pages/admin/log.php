<?php
include '../../inc/php/crudFuncts/select.php';
include '../../inc/php/connection.php';
$login = $_POST['login'];
$pass = $_POST['password'];
$connection = db_connect();
$user = checkLoginAdmin($connection, $login, $pass);
closeConnection($connection);
$error=null;
if($user['Password'] != $pass){
    $error = "Mot de passe incorrect!";
} else if ($user['idStatu'] != 1){
    $error = "Vous n'etes pas admin!";
} else if ($user == null){
    $error = "Utilisateur inexistant.";
}
if($error != null){
    header("Location:login.php?error=".$error);
} else{
    header("Location:home.php");
}

?>