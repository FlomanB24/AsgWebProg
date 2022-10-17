<?php 
  
  $server = "localhost";
  $db_username = "root";
  $db_password = "";
  $postDatabase= "books";

  $conf=mysqli_connect($server, $db_username, $db_password, $postDatabase);
  if (mysqli_connect_errno()){
      throw new Exception("MySQL connection error: ".mysqli_connect_error());
  }

    if(isset($_POST["submit"])){

        if (tambah($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('data berhasilgagal ditambahkan!');
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
    <title>Add Book</title>
</head>
<body>
    <h1>Add Book</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="BookName">Title :</label>
                <input type="text" name="BookName" id="BookName" required>
            </li>
            <li>
                <label for="AuthorName">Author Name :</label>
                <input type="text" name="AuthorName" id="AuthorName" required>
            </li>
            <li>
                <label for="Publisher">Publisher:</label>
                <input type="text" name="Publisher" id="Publisher" required>
            </li>
            <li>
                <label for="Page">Page :</label>
                <input type="text" name="Page" id="Page" required>
            </li>
            <li>
                <label for="Price">Price :</label>
                <input type="text" name="Price" id="Price" required>
            </li>
            <li>
                <button type="submit" name="submit">Add Book</button>
            </li>
        </ul>

    </form>
    
</body>
</html>