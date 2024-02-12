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