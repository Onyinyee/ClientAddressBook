<?php
//connection parameters
$server     = "localhost";
$username   = "root";
$password   = "";
$db         = "db_clientaddressbook";

//connect to database
$conn       = mysqli_connect($server, $username, $password, $db);

//check if connection was successful
if(!$conn){
    die("Connection failed: ". mysqli_connect_error() );
}

?>