<?php

$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$DATABASE = 'signupforms';

//connection the my sql database with php project
$connection = mysqli_connect ($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

if(!$connection){
    echo "Connection Failed";
    die(mysqli_error($connection));
}













?>