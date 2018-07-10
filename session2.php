<?php
    session_start();

    echo "Your username is ".$_SESSION['username']."<br>";
    echo "your email is ".$_SESSION['email']."<br>";

    //print_r($_SESSION);
    $_SESSION['username'] = "Johnsnow";
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=widthdevice  initial-scale=1" >

        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
    <h1>Client Addressbook 2</h1>
    <p><a href="logout.php">Logout of your session</a></p>

    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>    
    </body>
</html>