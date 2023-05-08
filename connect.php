<?php

// connecting to the database
$host = "localhost";
$database_name = "293 records";
$username = "myadmin";
$password = "Ainaixt!123";

$connect = mysqli_connect($host, $username, $password, $database_name);

// error message
if(!$connect){
    die("Error connecting to mySQL: " . mysqli_connect_error());

}

?>