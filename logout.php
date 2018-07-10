<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Logout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
    
    </head>
<body>

    <div class="container" style="padding-top: 10%; padding-right: 1.5%;">
    <?php
    session_start();

    //Did the users browser send a cookie for the session
    if(isset($_COOKIE[ session_name() ] ) ){

        setcookie( session_name(), '', time()-86400, '/');

    }

    session_unset();

    session_destroy();

    
    echo "<div class='alert alert-success text-center'><p>You've been logged out. Goodbye<br/><br/><button class='btn btn-danger btn-sm'><a href='login.php' style='text-decorate: none; color: white;'>Log Back in</a></button></p></div>";

    
   

    ?>
    </div>

    </div>

    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>
</html>

