<?php
function exeInsertThenNbRows( $connection, $query )
{
    $nbRowsInserted = 0;
    try {
        if ( mysqli_query( $connection, $query ) ) {

            $nbRowsInserted = mysqli_affected_rows( $connection );
            echo "Number of rows inserted: $nbRowsInserted";
        } else {
            // Display the MySQL error message
            $errorMessage = mysqli_error( $connection );
            echo "MySQL error: $errorMessage";
            throw new Exception( 'Query failed: ' . $errorMessage );
        }
    }
    catch ( Exception $e ) {
        // Handle the exception, e.g., log the error message
        error_log( $e->getMessage() );
        // Optionally, you can display the error message to the user in a user-friendly way
        echo "An error occurred: " . htmlspecialchars( $e->getMessage() );
    }

    return $nbRowsInserted;
}

function addVariete( $connection, $nomVariete, $occupation, $rendementParPied )
{
    if ( !isset( $nomVariete ) ) echo "nomVariete cannot be null!";
    if ( !isset( $occupation ) ) echo "occupation cannot be null!";
    if ( !isset( $rendementParPied ) ) echo "rendementParPied cannot be null!";

    $format = "INSERT INTO the_varietesthes (NomVariete, Occupation, RendementParPied) VALUES ('%s',%f, %f)";
    $query = sprintf( $format, $nomVariete, $occupation, $rendementParPied );

    return exeInsertThenNbRows( $connection, $query );
}

function addParcelle( $connection, $surface, $idVariete )
{
    if ( !isset( $surface ) ) echo "surface cannot be null!";
    if ( !isset( $idVariete ) ) echo "idVariete cannot be null!";

    $format = "INSERT INTO the_parcelles (Surface, idVarieteThe) VALUES (%f, %d)";
    $query = sprintf( $format, $surface, $idVariete );

    return exeInsertThenNbRows( $connection, $query );
}

function addCueilleur($connection, $nom, $dateNaissance, $idGenre)
{
    if ( !isset( $nom ) ) echo "nom cannot be null!";
    if ( !isset( $dateNaissance ) ) echo "dateNaissance cannot be null!";
    if ( !isset( $idGenre ) ) echo "idGenre cannot be null!";

    $format = "INSERT INTO the_cueilleurs (Nom, DateNaissance, idGenre) VALUES ('%s','%s', %d)";
    $query = sprintf( $format, $nom, $dateNaissance, $idGenre );

    return exeInsertThenNbRows( $connection, $query );
}

function addCategorieDepense( $connection, $nomCategorie )
{
    if ( !isset( $nomCategorie ) ) echo "nomCategorie cannot be null!";

    $format = "INSERT INTO the_categoriesdepenses (NomCategorie) VALUES ('%s')";
    $query = sprintf( $format, $nomCategorie );

    return exeInsertThenNbRows( $connection, $query );
}

function addCueillette($connection, $dateCueillette, $poidsCeuilli, $idParcelle, $idCeuilleur)
{
    if ( !isset( $dateCueillette ) ) echo "dateCueillette cannot be null!";
    if ( !isset( $poidsCeuilli ) ) echo "poidsCeuilli cannot be null!";
    if ( !isset( $idParcelle ) ) echo "idParcelle cannot be null!";
    if ( !isset( $idCeuilleur ) ) echo "idCeuilleur cannot be null!";

    $format = "INSERT INTO the_cueillettes (dateceuillette, poidsceuilli, idparcelle, idceuilleur) VALUES ('%s', %f, %d, %d)";
    $query = sprintf( $format, $dateCueillette, $poidsCeuilli, $idParcelle, $idCeuilleur );

    return exeInsertThenNbRows( $connection, $query );
}

function addSalaire( $connection, $salaire, $dateDebutSalaire = null )
{
    if ( !isset( $salaire ) ) echo "salaire cannot be null!";

    $format = "INSERT INTO the_salaires (salaire, DateDebutSalaire) VALUES (%f, %d)";
    $query = sprintf( $format, $salaire, $dateDebutSalaire );

    return exeInsertThenNbRows( $connection, $query );
}