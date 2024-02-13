<?php

// --- CHECK LOGIN  ---
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
function getMoisRegeneration($connection, $idVariete){
    $query = "SELECT * FROM the_Regenerations WHERE idVarieteThe = $idVariete";
    print($query);
    return exeSelect($connection, $query);
}

// Fonction de comparaison pour trier selon l'idMois
function comparaisonDecroissanteIdMois($a, $b) {
    return $b["idMois"] - $a["idMois"];
}

/// Recupere l'idVariete planter dans une parcelle donnee
function getIdVarieteByIdParcelle( $connection , $idParcelle){
    $idVariete = exeSelect($connection , "Select idVarieteThe from the_Parcelles WHERE idParcelle = ".$idParcelle);
    return $idVariete[0]['idVarieteThe'];
}
function getRegenerateStarter( $connection , $idParcelle ,$dateDebut , $dateFin ){
    $sep = explode("-" ,$dateFin);
    $deb = explode("-",$dateDebut);
    // Récupérer le mois sous forme numérique (de 1 à 12)
    $moisFin = $sep[1];
    
    $idVariete = getIdVarieteByIdParcelle($connection,$idParcelle);
    $moisRegenerations = getMoisRegeneration($connection , $idVariete);

    // Utilise la fonction usort() avec la fonction de comparaison pour trier le tableau
    usort($moisRegenerations, "comparaisonDecroissanteIdMois");
    $result = $deb[1];
    foreach ($moisRegenerations as $id => $mois) {
        if( $mois['idMois'] < $moisFin){
            $result = $mois['idMois'];
            break;
        }
    }
    return $result;
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

function getAllSalaires( $connection )
{
    return getAllRows( $connection, "the_salaires" );
}

function getAllGenre( $connection )
{
    return getAllRows( $connection, "the_Genres" );
}

function getAllMois( $connection )
{
    return getAllRows( $connection, "the_mois" );
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
function getPoidsTotalCueilliInPeriod( $connection, $dateDebut, $dateFin )
{
    $query = "SELECT sum(PoidsCeuilli) AS poids FROM the_cueillettes " .
        "WHERE DateCeuillette BETWEEN '$dateDebut' AND '$dateFin'";
    return exeSelect( $connection, $query )[0]['poids'];
}

function getPoidsTotalCueilliInParcelleInPeriod( $connection, $idParcelle, $dateDebut, $dateFin )
{
    $query = "SELECT sum(PoidsCeuilli) AS poids FROM the_cueillettes WHERE idParcelle = $idParcelle " .
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

/**
 * todo : update funct getPoidsRestantInParcelle()
 */
function getPoidsRestantInParcelle( $connection, $idParcelle, $dateDebut, $dateFin )
{
    // Assuming $dateDebut and $dateFin are strings in the format 'YYYY-MM-DD'
    list( $yearDebut, $monthDebut, $dayDebut ) = explode( '-', $dateDebut );
    list( $yearFin, $monthFin, $dayFin ) = explode( '-', $dateFin );

    $idMois = getRegenerateStarter($connection,$idParcelle,$dateDebut,$dateFin);
    // Determine the start date based on whether the month of $dateDebut is less than $dateFin
    $startDate = ($monthDebut < $monthFin || $yearDebut < $yearFin) ? "$yearFin-$idMois-01" : $dateDebut;
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


// - cueilleur -
function getPoidsTotalOfCueilleurInPeriod( $connection, $idCueilleur, $dateDebut, $dateFin )
{
    $query = "SELECT sum(PoidsCeuilli) as sum FROM the_cueillettes WHERE idCueilleur = $idCueilleur AND DateCeuillette BETWEEN '$dateDebut' AND '$dateFin'";
    return exeSelect( $connection, $query )[0]['sum'];
}


// - poids Minimal -
function getCurrentPoidsMin( $connection )
{
    $query = "SELECT Poids as s FROM the_poidsminimal ORDER BY idPoidsMinimal DESC LIMIT 1";
    return exeSelect( $connection, $query )[0]['s'];
}


// - bonus -
function getCurrentBonus( $connection )
{
    $query = "SELECT Bonus as s FROM the_bonus ORDER BY idBonus DESC LIMIT 1";
    return exeSelect( $connection, $query )[0]['s'];
}

function getValueOfBonusPerDay( $connection )
{
    $salaire = getCurrentSalaire( $connection );
    $percent = getCurrentBonus( $connection );
    return $salaire * $percent;
}

function getSumBonusOfCueilleurInPeriod( $connection, $idCueilleur, $dateDebut, $dateFin )
{
    $sumBonus = 0;
    $valueBonus = getValueOfBonusPerDay( $connection );
    $poidsMin = getCurrentPoidsMin( $connection );

    $query = "SELECT * FROM the_cueillettes WHERE idCueilleur = $idCueilleur AND PoidsCeuilli > $poidsMin AND DateCeuillette BETWEEN '$dateDebut' AND '$dateFin'";
    $daysBonus = exeSelect( $connection, $query );

    foreach ( $daysBonus as $ignored ) $sumBonus += $valueBonus;

    return $sumBonus;
}

function getSommeBonusAllCueilleursInPeriod( $connection, $dateDebut, $dateFin )
{
    $sumBonus = 0;
    $valueBonus = getValueOfMallusPerDay( $connection );
    $poidsMin = getCurrentPoidsMin( $connection );

    $query = "SELECT * FROM the_cueillettes WHERE PoidsCeuilli > $poidsMin AND DateCeuillette BETWEEN '$dateDebut' AND '$dateFin'";
    $daysBonus = exeSelect( $connection, $query );

    foreach ( $daysBonus as $ignored ) $sumBonus += $valueBonus;

    return $sumBonus;
}


// - mallus -
function getCurrentMallus( $connection )
{
    $query = "SELECT Mallus as s FROM the_mallus ORDER BY idMallus DESC LIMIT 1";
    return exeSelect( $connection, $query )[0]['s'];
}

function getValueOfMallusPerDay( $connection )
{
    $salaire = getCurrentSalaire( $connection );
    $percent = getCurrentMallus( $connection );
    return $salaire * $percent;
}

function getSumMallusOfCueilleurInPeriod( $connection, $idCueilleur, $dateDebut, $dateFin )
{
    $sumMallus = 0;
    $valueMallus = getValueOfMallusPerDay( $connection );
    $poidsMin = getCurrentPoidsMin( $connection );

    $query = "SELECT * FROM the_cueillettes WHERE idCueilleur = $idCueilleur AND PoidsCeuilli < $poidsMin AND DateCeuillette BETWEEN '$dateDebut' AND '$dateFin'";
    $daysBonus = exeSelect( $connection, $query );

    foreach ( $daysBonus as $ignored ) $sumMallus += $valueMallus;

    return $sumMallus;
}

function getSommeMallusAllCueilleursInPeriod( $connection, $dateDebut, $dateFin )
{
    $sumMallus = 0;
    $valueMallus = getValueOfMallusPerDay( $connection );
    $poidsMin = getCurrentPoidsMin( $connection );

    $query = "SELECT * FROM the_cueillettes WHERE PoidsCeuilli < $poidsMin AND DateCeuillette BETWEEN '$dateDebut' AND '$dateFin'";
    $daysBonus = exeSelect( $connection, $query );

    foreach ( $daysBonus as $ignored ) $sumMallus += $valueMallus;

    return $sumMallus;
}


// - salaires -
function getCurrentSalaire( $connection )
{
    $query = "SELECT salaire as s FROM the_salaires ORDER BY idSalaire DESC LIMIT 1";
    return exeSelect( $connection, $query )[0]['s'];
}

function getSommeSalairesInPeriod( $connection, $dateDebut, $dateFin )
{
    // get last inserted salaire
    $query = "SELECT salaire FROM the_salaires ORDER BY idSalaire DESC LIMIT  1";
    $montantSalaire = exeSelect( $connection, $query )[0]['salaire'];

    // get nb employees == nb cueillettes
    $query = "SELECT count(idCueilleur) as nb FROM " .
        "(SELECT * FROM the_cueillettes WHERE DateCeuillette BETWEEN '$dateDebut' AND '$dateFin') As t";
    $nbCueilleurs = exeSelect( $connection, $query )[0]['nb'];

    return $nbCueilleurs * $montantSalaire;
}

function getPaiementOfCueilleurInPeriod( $connection, $idCueilleur, $dateDebut, $dateFin )
{
    $salaire = getCurrentSalaire( $connection );
    $poidsTotal = getPoidsTotalOfCueilleurInPeriod( $connection, $idCueilleur, $dateDebut, $dateFin );
    $sumBonus = getSumBonusOfCueilleurInPeriod( $connection, $idCueilleur, $dateDebut, $dateFin );
    $sumMallus = getSumMallusOfCueilleurInPeriod( $connection, $idCueilleur, $dateDebut, $dateFin );

    // (salaire * poids) + Ebonus - Emallus
    return ($salaire * $poidsTotal) + $sumBonus - $sumMallus;
}


// - cout revient -
function getCoutRevientParKilo( $connection, $dateDebut, $dateFin )
{
    $sumNivoaka = getSommeCoutRevientInPeriod( $connection, $dateDebut, $dateFin );
    $poidsTotalCueilli = getPoidsTotalCueilliInPeriod( $connection, $dateDebut, $dateFin );

    return $sumNivoaka / $poidsTotalCueilli;
}

function getSommeCoutRevientInPeriod( $connection, $dateDebut, $dateFin )
{
    $sumSalairesCueilleurs = getSommeSalairesInPeriod( $connection, $dateDebut, $dateFin );
    $sumDepenses = getSommeDepensesInPeriod( $connection, $dateDebut, $dateFin );
    $sumBonusAllCueilleurs = getSommeBonusAllCueilleursInPeriod( $connection, $dateDebut, $dateFin );
    $sumMallusAllCueilleurs = getSommeMallusAllCueilleursInPeriod( $connection, $dateDebut, $dateFin );

    return $sumSalairesCueilleurs + $sumDepenses + $sumBonusAllCueilleurs - $sumMallusAllCueilleurs;
}


// PART TWO
// - Montant Vente -
function getSommeVenteInPeriod( $connection, $dateDebut, $dateFin )
{
    // get last inserted PrixVente
    $query = "SELECT MontantPrixVente, idVarieteThe FROM the_prixvente ORDER BY idPrixVente DESC limit 1";

    // get sum total Vente = sum ( poidsCueilli * montant )
    $query = "SELECT SUM(PoidsCeuilli * MontantPrixVente) as sum FROM
                (SELECT * FROM the_cueillettes WHERE DateCeuillette BETWEEN '$dateDebut' AND '$dateFin') AS c
                    JOIN the_parcelles as p on c.idParcelle = p.idParcelle
                    JOIN the_varietesthes as v on p.idVarieteThe = v.idVarieteThe
                    JOIN ($query) as pv on v.idVarieteThe = pv.idVarieteThe";

    return exeSelect( $connection, $query )[0]['sum'];
}

function getBeneficeInPeriod( $connection, $dateDebut, $dateFin )
{
    $sumVente = getSommeVenteInPeriod( $connection, $dateDebut, $dateFin );
    $sumRevient = getSommeCoutRevientInPeriod( $connection, $dateDebut, $dateFin );

    return $sumVente - $sumRevient;
}