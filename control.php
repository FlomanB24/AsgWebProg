<?php 

    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $postDatabase= "books";

    $conf=mysqli_connect($server, $db_username, $db_password, $postDatabase);
    if (mysqli_connect_errno()){
        throw new Exception("MySQL connection error: ".mysqli_connect_error());
    }

    function query ($query){
        global $conf;

        $temp = mysqli_query($conf, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($temp)){
            $rows[] = $row;
        }
        return $rows;
    }

    function add($postData){
        global $conf;

        //ambil postData dari tiap elemen dalam form 
        $BookName = htmlspecialchars($postData["BookName"]);
        $AuthorName = htmlspecialchars($postData["AuthorName"]);
        $Publisher = htmlspecialchars($postData["Publisher"]);
        $Page = htmlspecialchars($postData["Page"]);
        $Price = htmlspecialchars($postData["Price"]);

        $query = "INSERT INTO bookdetails
                VALUES 
                ('', '$BookName', '$AuthorName', '$Publisher', '$Page', '$Price')
                ";

        mysqli_query($conf, $query);

        return mysqli_affected_rows($conf);
    }
    
    function delete($BookID) {
        global $conf;
        mysqli_query($conf,"DELETE FROM bookdetails WHERE BookID = $BookID");
        return mysqli_affected_rows($conf);
    }

?>