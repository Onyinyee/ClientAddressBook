<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile Page</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=widthdevice  initial-scale = 1">

        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">

    </head>
    <body>
        <div class="container text-center well" style="color: orange; margin-top: 10%; background-color: black; border-radius: 2%;">
            <h1>Profile Page</h1>

            <p class="lead">Welcome <?php echo $_SESSION['LoggedInUser']; ?>!</p> 
            <p>Your email address is: <?php echo $_SESSION['LoggedInEmail']; ?></p>
            <p><a href="logout.php" class="btn btn-danger btn-sm">Log out</a></p>  



           
        </div>
        
        <script src="./js/jquery.js"></script>
        <script src="./js/bootstrap.min.js"></script>
    </body>
</html>