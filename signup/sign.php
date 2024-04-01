<?php

$succes =0;
$user =0;
$invalid=0;

//ensureing the connect.php is only executed when the HTTP request method is POST
if ($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';

    //creating the variable for for fields
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $hashedPw = password_hash($password, PASSWORD_DEFAULT);

    if(!empty($username)&&  !empty($password)){

            //sql query for get the username from registration table
    $sql2 = "SELECT * FROM registration WHERE username = '$username'";

    $result = mysqli_query($connection, $sql2);

    if ($result){
        //checking the how many rows containing the $username value
        $num = mysqli_num_rows ($result);

        if($num >0){
            //echo "User already exist";
            $user =1;

        }else{
            if($password === $cpassword){

                   //sql query to insert data in to the registration table
    $sql = "INSERT INTO registration(username, password) VALUES ('$username','$hashedPw')";
    $result = mysqli_query($connection, $sql);
    if($result){
        //echo "Signup Successfull";
        $succes = 1;
        header('location:login.php');

    }else{
        echo "hi";
        die(mysqli_error($connection));
    }
                  



            }else{
                $invalid =1;
            }
 


    }

    }
    }else{
        $invalid =1;
        
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

    <title>Signup Page</title>
  </head>
  <body>
    <?php
    if ($user){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong> User Already Exist...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }    if ($invalid){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong> Password does not match...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    if ($succes){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Sucess! </strong> You successfully logged to the system...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }



    ?>
    
    <div class="container mt-5">
    <h1 class = "text-center">Signup Page </h1>
    <form action = "sign.php" method = "post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" placeholder = "Enter your name " name = "username">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control"  placeholder = "Enter your password " name = "password">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control"  placeholder = "Confirm your password " name = "cpassword">
  </div>


  <button type="submit" class="btn btn-primary w-100">Sign up</button>
</form>



    </div>


  </body>
</html>