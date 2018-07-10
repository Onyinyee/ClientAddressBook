<?php

         $formUser = $formPass = $user = $email = $hashedpass = $loginError = "";

        if(isset($_POST['login']) ){
            //Create a function to validate form data
            function ValidateFormData($formData){
                $formData = trim( stripslashes( htmlspecialchars( $formData) ) );
                return $formData;
            }
        

            //Create form variables
            //Wrap data with our function
            $formUser = ValidateFormData($_POST['username']);
            $formPass = ValidateFormData($_POST['password']);

            //Connect to database
            include("connection.php");

            //Create SQL query
            $query = "SELECT username, email, password FROM users WHERE username='$formUser'";

            //Store result
            $result = mysqli_query($conn, $query);

            //Verify if result is returned
            if( mysqli_num_rows($result) > 0){

                while($row = mysqli_fetch_assoc($result)){

                    //Store basic form data in variables
                    $user       = $row['username'];
                    $email      = $row['email']; 
                    $hashedpass = $row['password'];
                }
                
                //Verify form password with hashed password
                if(password_verify($formPass, $hashedpass)){

                    //Correct login details
                    //Start session
                    session_start();

                   // Store data in session variables
                    $_SESSION['LoggedInUser']   = $user;
                    $_SESSION['LoggedInEmail']   = $email; 
                    

                    header("location: profile.php");

                }else{
                    
                    $loginError = "<div class='alert alert-danger'>Wrong username / password combination. Try again.</div>";
                
                    }
            }else{
                        //No such result in database

                        $loginError = "<div class='alert alert-danger'>No such user in database. Please try again.<a class='close' data-dismiss='alert'>&times;</a></div>";
                     } 
            

        

            mysqli_close($conn);
        }


    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Log In</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=widthdevice  initial-scale = 1">

        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">

    </head>
    <body>
        <div class="container text-center well" style="margin-top: 10%; padding-bottom: 7%; color: orange; background-color: black; border-radius:2%;">
            <h1>Login</h1>
            <p class="lead">Use This Form To Log Into Your Account.</p> 

            <?php echo $loginError; ?>

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
        
        <script src="./js/jquery.js"></script>
        <script src="./js/bootstrap.min.js"></script>
    </body>
</html>