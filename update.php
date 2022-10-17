<?php 
    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $postDatabase= "books";

    $conf=mysqli_connect($server, $db_username, $db_password, $postDatabase);
    if (mysqli_connect_errno()){
        throw new Exception("MySQL connection error: ".mysqli_connect_error());
    }

    $id = $_GET["id"];

    $mhs = query ("SELECT * FROM bookdetails WHERE id = $id")[0];

    if(isset($_POST["submit"])){

        if (ubah($_POST) > 0){
            echo "
                <script>
                    alert('data updated successfully!');
                    document.location.href = 'index.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('data failed to update!');
                    document.location.href = 'index.php';
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book Details</title>
</head>
<body>
    <h1>Update Book Details</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <ul>
            <li>
                <label for="BookName">Title :</label>
                <input type="text" name="BookName" id="BookName" required 
                value="<?= $mhs["BookName"]  ?>">

            </li>
            <li>
                <label for="AuthorName">Author Name :</label>
                <input type="text" name="AuthorName" id="AuthorName" required
                value="<?= $mhs["AuthorName"]  ?>">
            </li>
            <li>
                <label for="Publisher">Publisher:</label>
                <input type="text" name="Publisher" id="Publisher" required
                value="<?= $mhs["Publisher"]  ?>">
            </li>
            <li>
                <label for="Page">Page :</label>
                <input type="text" name="Page" id="Page" required
                value="<?= $mhs["Page"]  ?>">
            </li>
            <li>
                <label for="Price">Price :</label>
                <input type="text" name="Price" id="Price" required
                value="<?= $mhs["Price"]  ?>">
            </li>
            <li>
                <button type="submit" name="submit">Update</button>
            </li>
        </ul>

    </form>
    
</body>
</html>