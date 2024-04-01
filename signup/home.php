<?php
session_start();

if(!isset($_SESSION['username'])){
    header('location:login.php');
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Welcome Page</title>
  </head>
  <body>
    <h1 class = "text-center text-danger mt-5">Welcome <?php echo $_SESSION['username']; ?></h1>
    <div class="container">
        <div class="col-md-12 text-center">
        <a href="Logout.php" class="btn btn-primary mt-5 ">Logout</a>
        </div>
    


    </div>
    


  </body>
</html>