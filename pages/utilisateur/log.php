<?php
include '../../inc/php/crudFuncts/select.php';
include '../../inc/php/connection.php';
$login = $_POST['login'];
$pass = $_POST['password'];
$connection = db_connect();
$user = checkLoginUser($connection, $login, $pass);
$error=null;
closeConnection($connection);
 if ($user['idStatu'] != 2){
    $error = "Vous n'etes pas admin!";
} else if ($user == null){
    $error = "Utilisateur inexistant.";
}
else if($user['Password'] != $pass){
    echo($pass."  ".$user['Password']);
    $error = "Mot de passe incorrect!";
}
if($error != null){
    header("Location:login.php?error=".$error);
} else{
    header("Location:home.php");
}

?>