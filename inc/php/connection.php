<?php
    function db_connect() {
        static $connect = null;
        if( $connect === null ) {
            $connect = mysqli_connect( 'localhost','root','root','the' );
        }
        return $connect;
    }

    function closeConnection($connection) {
        if ($connection !== null && mysqli_ping($connection)) {
            mysqli_close($connection);
        }
    } 
?>