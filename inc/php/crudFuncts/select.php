<?php

/**
 * Return the number of row matching Pseudo+Password. If 1, SUCCESS. Else, FAILED.
 * @param string $pseudo
 * @param string $password
 * @return int|string
 */
function checkLogin( $connection, $pseudo, $password )
{
    $format = "SELECT * FROM Users WHERE pseudo = '%s' AND password = '%s'";
    $query = sprintf( $format, $pseudo, $password );
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
        // Handle the exception, e.g., log the error message
        error_log( $e->getMessage() );
        // Optionally, you can display the error message to the user in a user-friendly way
        echo "An error occurred: " . htmlspecialchars( $e->getMessage() );
    }

    // Return the number of rows returned by the query
    return mysqli_num_rows( $result );
}