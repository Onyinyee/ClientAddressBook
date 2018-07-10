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
    <body>

        <div class="container">

            <h1> Password Hashing </h1>

                <?php
                   $password = password_verify('mypassword', PASSWORD_DEFAULT);
                   echo $password;

                    // $hashedPassword = '$2y$10$E8XlqmQyN1ixhEp/up3OVem04XqaOFxV8WidUkkltyOi4tARRE.nW';
                    
                    // if( isset($_POST['Login'])){

                    //     if( password_verify($_POST['password'], $hashedPassword) ){
                    //         echo "Correct password";
                    //     }else{
                    //         echo "Incorrect password";
                    //     }
                    // }
                ?>

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="form-group">

                    <label for="password">Password</label>
                        <input type="password" name="password" placeholder="password">
                        <input type="submit" value="Log in" name="Login" class="btn btn-default">

                </form>
        </div>  
        
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>                       