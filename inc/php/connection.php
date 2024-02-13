<?php
    function db_connect() {
        static $connect = null;
        if( $connect === null ) {
            $connect = mysqli_connect( '172.10.0.113','ETU002434','6H3zGFFxLndm','db_p16_ETU002434' );
        }
        return $connect;
    }

    function closeConnection($connection) {
        if ($connection !== null && mysqli_ping($connection)) {
            mysqli_close($connection);
        }
    } 
?>