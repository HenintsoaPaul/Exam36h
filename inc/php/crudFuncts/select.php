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

function getAllParcelles( $connection )
{
    return getAllRows( $connection, "the_parcelles" );
}


function getAllVarietes( $connection )
{
    return getAllRows( $connection, "the_varietesthes" );
}

function getAllDepenses( $connection )
{
    return getAllRows( $connection, "the_depenses" );
}

function getAllGenre( $connection )
{
    return getAllRows( $connection, "the_Genres" );
}

function getAllCueillettes( $connection )
{
    return getAllRows( $connection, "the_cueillettes" );
}

function getAllUsers( $connection )
{
    return getAllRows( $connection, "the_users" );
}

function getAllCategoriesDepenses( $connection )
{
    return getAllRows( $connection, "the_CategoriesDepenses" );
}


// --- GLOBAL RESULT ---
// - cueillette -
function getPoidsTotalCueilli( $connection )
{
    $query = "SELECT sum(PoidsCeuilli) AS poids FROM the_cueillettes";
    return exeSelect( $connection, $query )[0]['poids'];
}

function getPoidsTotalCueilliInPeriod( $connection, $dateDebut, $dateFin )
{
    $query = "SELECT sum(PoidsCeuilli) AS poids FROM the_cueillettes " .
        "WHERE DateCeuillette BETWEEN '$dateDebut' AND '$dateFin'";
    return exeSelect( $connection, $query )[0]['poids'];
}

function getPoidsTotalCueilliInParcelleInPeriod( $connection, $idParcelle, $dateDebut, $dateFin )
{
    $query = "SELECT sum(PoidsCeuilli) AS poids FROM the_cueillettes WHERE idParcelle = $idParcelle ".
        "AND DateCeuillette BETWEEN '$dateDebut' AND '$dateFin'";
    return exeSelect( $connection, $query )[0]['poids'];
}


// - parcelle -
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
            WHERE p.idParcelle = $idParcelle";
    $row = exeSelect( $connection, $query )[0];

    // Calculate the number of tree feet
    $nbPieds = $surface / $row['occupation'];

    return $nbPieds * $row['rendement'];
}

function getPoidsRestantInParcelle( $connection, $idParcelle, $dateDebut, $dateFin )
{
    // Assuming $dateDebut and $dateFin are strings in the format 'YYYY-MM-DD'
    list( $yearDebut, $monthDebut, $dayDebut ) = explode( '-', $dateDebut );
    list( $yearFin, $monthFin, $dayFin ) = explode( '-', $dateFin );

    // Determine the start date based on whether the month of $dateDebut is less than $dateFin
    $startDate = ($monthDebut < $monthFin || $yearDebut < $yearFin) ? "$yearFin-$monthFin-01" : $dateDebut;

    $nesorina = getPoidsTotalCueilliInParcelleInPeriod( $connection, $idParcelle, $startDate, $dateFin );
    $produit = getPoidsTotalInParcelle( $connection, $idParcelle ); // constant tout les debuts de mois

    return $produit - $nesorina;
}


// - depense -
function getSommeDepensesInPeriod( $connection, $dateDebut, $dateFin )
{
    $query = "SELECT sum(MontantDepense) as sumD FROM the_depenses " .
        "WHERE DateDepense BETWEEN '$dateDebut' AND '$dateFin'";
    return exeSelect( $connection, $query )[0]['sumD'];
}


// - salaires -
function getSommeSalairesInPeriod( $connection, $dateDebut, $dateFin )
{
    // get last inserted salaire
    $query = "SELECT salaire FROM the_salaires ORDER BY idSalaire DESC LIMIT  1";
    $montantSalaire = exeSelect( $connection, $query )[0]['salaire'];

    // get nb employees == nb cueillettes
    $query = "SELECT count(idCeuilleur) as nb FROM ".
        "(SELECT * FROM the_cueillettes WHERE DateCeuillette BETWEEN '$dateDebut' AND '$dateFin') As t";
    $nbCueilleurs = exeSelect( $connection, $query )[0]['nb'];

    return $nbCueilleurs * $montantSalaire;
}


// - other -
function getCoutRevientParKilo( $connection, $dateDebut, $dateFin )
{
    $sumSalairesCueilleurs = getSommeSalairesInPeriod( $connection, $dateDebut, $dateFin );
    $sumDepenses = getSommeDepensesInPeriod( $connection, $dateDebut, $dateFin );
    $sumNivoaka = $sumSalairesCueilleurs - $sumDepenses;

    $poidsTotalCueilli = getPoidsTotalCueilliInPeriod( $connection, $dateDebut, $dateFin );

    return $sumNivoaka / $poidsTotalCueilli;
}