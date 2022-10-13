<?php 
    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $database= "books";
    
    $conf=mysqli_connect($server, $db_username, $db_password, $database);
    if (mysqli_connect_errno())
    {
        throw new Exception("MySQL connection error: ".mysqli_connect_error());
    }

    $temp = mysqli_query($conf, "SELECT * FROM bookdetails");

    // $sql = "INSERT INTO bookdetails(BookID, BookName, AuthorName, Publisher, Page, Price)
    //         VALUES  ('', 'Little Dorrit', 'Charles Dickens', 'Fiction', 450, 50000),
    //                 ('', 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', 160, 70000),
    //                 ('', 'Rindu', 'Tere Liye', 'Republika', 544, 90000),
    //                 ('', 'Belantik', 'Ahmad Tohari', 'Gramedia', 273, 60000),
    //                 ('', 'Blood of Empire', 'Brian McClellan', 'Orbit', 672, 100000),
    //                 ('', 'Wrath of Empire', 'Brian McClellan', 'Orbit', 652, 100000);";
    //         if(mysqli_query($conf, $sql)){
    //             echo "Records inserted successfully.";
    //         } else{
    //             echo "ERROR: Could not able to execute $sql. " . mysqli_error($conf);
    //         }

    // $view = "SELECT * FROM bookdetails";
    // $result = mysqli_query($conf, $view);
    // while($row = mysqli_fetch_array($result)){
    //     echo $row['BookID'];
    //     echo $row['BookName'];
    //     echo $row['AuthorName'];
    //     echo $row['Publisher'];                    
    //     echo $row['Page'];                    
    //     echo $row['Price'];                 
    // }

    // $sql = "UPDATE bookdetails SET Publisher='Rajawali' WHERE page=450";
    //     if(mysqli_query($conf, $sql)){
    //         echo "Records were updated successfully.";
    //     } else {
    //         echo "ERROR: Could not able to execute $sql. " . mysqli_error($conf);
    //     }

    // $sql = "DELETE FROM bookdetails WHERE Publisher='Rajawali'";
    // if(mysqli_query($conf, $sql)){
    //     echo "Records were deleted successfully.";
    // } else {
    //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conf);
    // }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

        <!-- Bootstrap icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

        <!-- My CSS -->
        <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>
<body>
    <section class="jumbotron text-center">
        <h1 class="display-4">Book List</h1>
        <div class="container">
        <div class="row text-center">
              <div class="col mb-3">
              </div>
            </div>
            <div class="row justify-content-center fs-5">
              <div class="col-md-7">
                <table border="1" cellspacing="0" cellpadding="10">
                    <tr>
                        <th>No.</th>
                        <th>Book Name</th>
                        <th>Author Name</th>
                        <th>Publisher</th>
                        <th>Page</th>
                        <th>Price</th>
                    </tr>

                    <?php $i = 1 ; ?>
                    <?php while($row = mysqli_fetch_assoc($temp)) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row["BookName"]; ?></td>
                        <td><?= $row["AuthorName"]; ?></td>
                        <td><?= $row["Publisher"]; ?></td>
                        <td><?= $row["Page"]; ?></td>
                        <td><?= $row["Price"]; ?></td>
                        <td>
                            <a href="delete.php?BookID=<?= $row["BookID"]; ?>" onclick="return confirm('yakin');">Delete</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endwhile ; ?>
                </table>
            </div>
          </div>
        </div>
    </section>
    
</body>
</html>