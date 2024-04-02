<?php

$login =0;
$invalid =0;

//ensureing the connect.php is only executed when the HTTP request method is POST
if ($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';

    //creating the variable for for fields
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password)){

            //sql query for get the username from registration table
    $sql2 = "SELECT * FROM registration WHERE username = '$username' and password = '$password'";
    
    

    $res2 = "SELECT password FROM registration WHERE username = '$username'";
    

    $resultN = mysqli_query($connection, $res2);

    // Check if the query was successful
    if ($resultN) {
    // Fetch the row from the result object
        $row = mysqli_fetch_assoc($resultN);
    // Extract the password from the row
        $hashedpassword = $row['password'];


        if (password_verify($password, $hashedpassword)){
            $login =1;
 
            session_start();
            $_SESSION['username']=$username;
            header('location:home.php');




        }else{
            $invalid =1;

        }
    }



$result = mysqli_query($connection, $sql2);
  

    if ($result){
        //checking the how many rows containing the $username and password value
        $num = mysqli_num_rows ($result);

        if($num >0){

          
        
    
        
       

        }else{
             $invalid =1;
            //echo "Please check your username and password again";


    }

    }
        
    }else{

        $invalid=1;

    } 



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

    <title>Login Page</title>
  </head>
  <body>


  <?php
    if ($login){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Sucess! </strong> You logged in successfully...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if ($invalid){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong> Your username or password wrong...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }



    ?>
    
    
    <div class="container mt-5">
      <h1 class = "text-center">Login to Our Website </h1>
      <div class="col-md-6 mx-auto">
        <form action = "login.php" method = "post" class ="mx-auto">
          
          <div class="mb-3 mt-5 ">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" placeholder = "Enter your name " name = "username">
    
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control"  placeholder = "Enter your password " name = "password">
          </div>

          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

    </div>
    


    </div>


  </body>
</html>