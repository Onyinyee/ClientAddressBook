<?php 
include('connection.php'); 
//$password = password_hash('abc123', PASSWORD_DEFAULT);
//echo $password;

?>

<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-compatible" content="IE=Edge">
        <meta name="viewport" content="width=widthdevice, initial-scale=1">

        <title>My Client Addressbook </title>

        <link rel="stylesheet" href="css/bootstrap.min.css">    
        <link rel="stylesheet" href="css/style.css"> 

    </head>
    <body style="background-color: #AAA0A0; border: 10px; border-style:solid; border-color: #844O3B;">

    <div class="well"  style="margin: 5%; background-color: #4D6D9A; border: none;" >
    <div class="well" style="background-color:#99CED3; border: none; margin-left: 10%; width: 80%;">

      <div class="container text-center well" style="padding-bottom: 7%; border: none; color: #5F6366; background-color: #88B3D1; border-radius:2%; width:95%;">
            <h1 style="font-family: lucida;">Login</h1>
            <p style="font-family: lucida;"class="lead">Use This Form To Log Into Your Account.</p> 


                <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    
                    <div class="form-group">
                        <label for="login-username" class="sr-only">Username</label>
                        <input type="text" class="form-control" id="login-username" placeholder="Username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="login-password" class="sr-only">Password</label>
                        <input type="password" class="form-control" id="login-password" placeholder="Password" name="password">
                    </div>
                    <button type="submit" class="btn btn-default" name="login">Login!</button>

                
                </form>


        </div>
        </div> 
    </div> 
        
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>                       