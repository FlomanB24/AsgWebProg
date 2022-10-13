<?php 

    require 'control.php';

    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $database= "books";
    
    $conf = mysqli_connect($server, $db_username, $db_password, $database);
    if (mysqli_connect_errno())
    {
        throw new Exception("MySQL connection error: ".mysqli_connect_error());
    }

    $BookID = $_GET["BookID"];

    if(delete($BookID) > 0){
        echo "
                <script>
                    alert('data deleted successfully!');
                    document.location.href = 'index.php';
                </script>
            ";
    }else{
        echo "
                <script>
                    alert('data failed to delete');
                    document.location.href = 'index.php';
                </script>
            ";
    }
?>