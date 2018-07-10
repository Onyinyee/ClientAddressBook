<?php
    $server     = "localhost";
    $username   = "root";
    $password   = "";
    $db   = "myclientaddressbook";

    //Establish Connection
    $conn = mysqli_connect( $server, $username, $password, $db);

    //Check Connection
    if(!$conn){
        die("Connection Error: " . mysqli_connect_error());
    }
?>