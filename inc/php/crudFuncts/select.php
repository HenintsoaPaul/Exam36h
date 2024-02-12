<?php

// --- CHECK LOGIN ---
/**
 * Return the number of row matching Pseudo+Password. If 1, SUCCESS. Else, FAILED.
 * @param string $pseudo
 * @param string $password
 * @return int|string
 */
function checkLogin( $connection, $pseudo, $password, $idStatus )
{
    $format = "SELECT * FROM the_users WHERE pseudo = '%s'";
    $query = sprintf( $format, $pseudo );
    $result = false;
    try {
        $result = mysqli_query( $connection, $query );

        if ( !$result ) {
            // Display the MySQL error message
            $errorMessage = mysqli_error( $connection );
            echo "MySQL error: $errorMessage";
            throw new Exception( 'Query failed: ' . $errorMessage );
        }
    }
    catch ( Exception $e ) {
        error_log( $e->getMessage() );
        echo "An error occurred: " . htmlspecialchars( $e->getMessage() );
    }
    return mysqli_fetch_assoc( $result );
}

/**
 * Return 1 on SUCCESS.
 */
function checkLoginAdmin( $connection, $pseudo, $password )
{
    return checkLogin( $connection, $pseudo, $password, 1 );
}

/**
 * Return 1 on SUCCESS.
 */
function checkLoginUser( $connection, $pseudo, $password )
{
    return checkLogin( $connection, $pseudo, $password, 2 );
}

// --- SELECT ---
/**
 * @param $query string A valid select query.
 * @return array|null An ARRAY OF ROWS from the query.
 */
function exeSelect( $connection, $query )
{
    try {
        $result = mysqli_query( $connection, $query );

        // Initialize an empty array to hold the rows
        $utilisateurs = [];

        // Loop through the result set and store each row as an associative array
        while ( $row = mysqli_fetch_assoc( $result ) ) {
            foreach ( $row as &$value ) {
                // If the value looks like an integer, cast it to an integer.
                if ( ctype_digit( (string) $value ) ) {
                    $value = (int) $value;
                }
            }
            $utilisateurs[] = $row;
        }

        // Return all utilisateur records
        return $utilisateurs;
    }
    catch ( Exception $e ) {
        // Handle the exception, e.g., log the error message
        error_log( $e->getMessage() );
        // Optionally, you can display the error message to the user in a user-friendly way
        echo "An error occurred: " . htmlspecialchars( $e->getMessage() );
    }
    return null;
}

// SELECT ALL COLUMNS + ALL ROWS
/**
 * Return all columns of all rows in the specified table. Columns' name are the indexes of a row.
 */
function getAllRows( $connection, $tableName )
{
    if ( isset( $connection ) && isset( $tableName ) ) {
        $query = "SELECT * FROM $tableName";
        return exeSelect( $connection, $query );
    } else {
        echo "connection OR tableName cannot be null!";
        return null;
    }
}

function getAllCueilleurs( $connection )
{
    return getAllRows( $connection, "the_cueilleurs" );
}

function getAllVarietes( $connection )
{
    return getAllRows( $connection, "the_varietesthes" );
}

function getAllDepenses( $connection )
{
    return getAllRows( $connection, "the_depenses" );
}

function getAllCategoriesDepenses( $connection )
{
    return getAllRows( $connection, "the_CategoriesDepenses" );
}

function getPoidsTotalCueillette( $connection )
{
    $alias = "poidsTotal";
    $query = "SELECT sum(PoidsCeuilli) AS $alias FROM the_cueillettes";
    $row = exeSelect( $connection, $query )[0];
    return $row[$alias];
}

function getPoidsRestantOnParcelle( $connection, $idParcelle )
{
    $query = "";
}

function getPoidsTotalInParcelle( $connection, $idParcelle )
{
    // Get the surface area of the parcel
    $query = "SELECT surface FROM the_parcelles WHERE idParcelle = $idParcelle";
    $surface = exeSelect( $connection, $query )[0]['surface'];

    // Convert the surface area : Ha -> square meters
    $surface *= 10000;

    // Get the occupancy rate and yield for the varietal planted in the parcel
    $query = "SELECT occupation, RendementParPied as rendement FROM the_varietesthes v
             JOIN the_parcelles p ON p.idVarieteThe = v.idVarieteThe
            WHERE p.idVarieteThe = $idParcelle";
    $row = exeSelect( $connection, $query )[0];
    var_dump($row);

    // Calculate the number of tree feet
    $nbPieds = $surface / $row['occupation'];

    return $nbPieds * $row['rendement'];
}