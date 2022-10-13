<?php 

    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $database= "books";

    $conf=mysqli_connect($server, $db_username, $db_password, $database);
    if (mysqli_connect_errno()){
        throw new Exception("MySQL connection error: ".mysqli_connect_error());
    }
    
    function delete($BookID) {
        global $conf;
        mysqli_query($conf,"DELETE FROM bookdetails WHERE BookID = $BookID");
        return mysqli_affected_rows($conf);
    }

?>