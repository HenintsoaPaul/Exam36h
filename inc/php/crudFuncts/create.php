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

/**
 * @return int 0 on FAILURE, otherwise SUCCESS.
 */
function exeInsertThenLastId( $connection, $query )
{
    try {
        if ( mysqli_query( $connection, $query ) ) {
            if ( mysqli_affected_rows( $connection ) === 1 ) {
                // Retrieve the ID of the last inserted record
                $lastId = mysqli_insert_id( $connection );
            }
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

    return isset( $lastId ) ? $lastId : 0; // Returns the ID if available, otherwise  0
}

/**
 * @return int last inserted id on SUCCESS, otherwise 0.
 */
function addVariete( $connection, $nomVariete, $occupation, $rendementParPied )
{
    if ( !isset( $nomVariete ) ) echo "nomVariete cannot be null!";
    if ( !isset( $occupation ) ) echo "occupation cannot be null!";
    if ( !isset( $rendementParPied ) ) echo "rendementParPied cannot be null!";

    $format = "INSERT INTO the_varietesthes (NomVariete, Occupation, RendementParPied) VALUES ('%s',%f, %f)";
    $query = sprintf( $format, $nomVariete, $occupation, $rendementParPied );

    return exeInsertThenLastId( $connection, $query );
}

/**
 * @return int 1 on SUCCESS.
 */
function addParcelle( $connection, $surface, $idVariete )
{
    if ( !isset( $surface ) ) echo "surface cannot be null!";
    if ( !isset( $idVariete ) ) echo "idVariete cannot be null!";

    $format = "INSERT INTO the_parcelles (Surface, idVarieteThe) VALUES (%f, %d)";
    $query = sprintf( $format, $surface, $idVariete );

    return exeInsertThenNbRows( $connection, $query );
}

/**
 * @return int 1 on SUCCESS.
 */
function addCueilleur( $connection, $nom, $dateNaissance, $idGenre )
{
    if ( !isset( $nom ) ) echo "nom cannot be null!";
    if ( !isset( $dateNaissance ) ) echo "dateNaissance cannot be null!";
    if ( !isset( $idGenre ) ) echo "idGenre cannot be null!";

    $format = "INSERT INTO the_cueilleurs (Nom, DateNaissance, idGenre) VALUES ('%s','%s', %d)";
    $query = sprintf( $format, $nom, $dateNaissance, $idGenre );

    return exeInsertThenNbRows( $connection, $query );
}

/**
 * @return int 1 on SUCCESS.
 */
function addCategorieDepense( $connection, $nomCategorie )
{
    if ( !isset( $nomCategorie ) ) echo "nomCategorie cannot be null!";

    $format = "INSERT INTO the_categoriesdepenses (NomCategorie) VALUES ('%s')";
    $query = sprintf( $format, $nomCategorie );

    return exeInsertThenNbRows( $connection, $query );
}

/**
 * @return int 1 on SUCCESS.
 */
function addCueillette( $connection, $dateCueillette, $poidsCeuilli, $idParcelle, $idCeuilleur )
{
    if ( !isset( $dateCueillette ) ) echo "dateCueillette cannot be null!";
    if ( !isset( $poidsCeuilli ) ) echo "poidsCeuilli cannot be null!";
    if ( !isset( $idParcelle ) ) echo "idParcelle cannot be null!";
    if ( !isset( $idCeuilleur ) ) echo "idCeuilleur cannot be null!";

    $format = "INSERT INTO the_cueillettes (dateceuillette, poidsceuilli, idparcelle, idceuilleur) VALUES ('%s', %f, %d, %d)";
    $query = sprintf( $format, $dateCueillette, $poidsCeuilli, $idParcelle, $idCeuilleur );

    return exeInsertThenNbRows( $connection, $query );
}

/**
 * @return int 1 on SUCCESS.
 */
function addSalaire( $connection, $salaire, $dateDebutSalaire )
{
    if ( !isset( $salaire ) ) echo "salaire cannot be null!";

    $format = "INSERT INTO the_salaires (salaire, DateDebutSalaire) VALUES (%f,'" . $dateDebutSalaire . "')";
    $query = sprintf( $format, $salaire );
    echo $query;

    return exeInsertThenNbRows( $connection, $query );
}

/**
 * @return int 1 on SUCCESS.
 */
function addDepense( $connection, $dateDepense, $montantDepense, $idCategorieDepense )
{
    if ( !isset( $dateDepense ) ) echo "dateDepense cannot be null!";
    if ( !isset( $montantDepense ) ) echo "montantDepense cannot be null!";
    if ( !isset( $idCategorieDepense ) ) echo "idCategorieDepense cannot be null!";

    $format = "INSERT INTO the_depenses (datedepense, montantdepense, idcategoriedepense) VALUES ('%s',%f, %d)";
    $query = sprintf( $format, $dateDepense, $montantDepense, $idCategorieDepense );

    return exeInsertThenNbRows( $connection, $query );
}

/**
 * @return int 1 on SUCCESS.
 */
function addRegeneration( $connection, $idMois, $idVarieteThe )
{
    if ( !isset( $idMois ) ) echo "idMois cannot be null!";
    if ( !isset( $idVarieteThe ) ) echo "idVarieteThe cannot be null!";

    $format = "INSERT INTO the_regenerations ( idMois, idVarieteThe ) VALUES (%d,%d)";
    $query = sprintf( $format, $idMois, $idVarieteThe );

    return exeInsertThenNbRows( $connection, $query );
}

/**
 * @return int 1 on SUCCESS.
 */
function addBonus( $connection, $bonus, $date, $idCueilleur )
{
    if ( !isset( $bonus ) ) echo "bonus cannot be null!";
    if ( !isset( $date ) ) echo "date cannot be null!";
    if ( !isset( $idCueilleur ) ) echo "idCueilleur cannot be null!";

    $format = "INSERT INTO the_bonus (bonus, dateconfig, idcueilleur) VALUES (%f, '%s', %d)";
    $query = sprintf( $format, $bonus, $date, $idCueilleur );

    return exeInsertThenNbRows( $connection, $query );
}

/**
 * @return int 1 on SUCCESS.
 */
function addMallus( $connection, $mallus, $date, $idCueilleur )
{
    if ( !isset( $mallus ) ) echo "mallus cannot be null!";
    if ( !isset( $date ) ) echo "date cannot be null!";
    if ( !isset( $idCueilleur ) ) echo "idCueilleur cannot be null!";

    $format = "INSERT INTO the_mallus (mallus, dateconfig, idcueilleur) VALUES (%f, '%s', %d)";
    $query = sprintf( $format, $mallus, $date, $idCueilleur );

    return exeInsertThenNbRows( $connection, $query );
}

/**
 * @return int 1 on SUCCESS.
 */
function addPoidsMinimal( $connection, $poids, $date, $idCueilleur )
{
    if ( !isset( $poids ) ) echo "poids cannot be null!";
    if ( !isset( $date ) ) echo "date cannot be null!";
    if ( !isset( $idCueilleur ) ) echo "idCueilleur cannot be null!";

    $format = "INSERT INTO the_poidsminimal (Poids, dateconfig, idcueilleur) VALUES (%f, '%s', %d)";
    $query = sprintf( $format, $poids, $date, $idCueilleur );

    return exeInsertThenNbRows( $connection, $query );
}
