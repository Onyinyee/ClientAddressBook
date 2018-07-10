<?php 
session_start();

include('includes/functions.php');
$_SESSION['loggedInUser'] = $name;

//Check if form has been submitted
if(isset($_POST['login'])){

    //create form variables
    //validate form variables 

    $formEmail  = validateFormData($_POST['email']);
    $formPass   = validateFormData($_POST['password']);

    //connect to database
    include('includes/connection.php');

    //create query
    $query      = "SELECT name, password FROM users WHERE email='$formEmail'";

    //store the result
    $result     = mysqli_query($conn, $query);

    //verify if the result is returned
    if(mysqli_num_rows($result) > 0){

        //store basic user data in variables
        while($row = mysqli_fetch_assoc($result)){
            $name       = $row['name'];
            $hashedPass = $row['password'];
        }
        //verify hashed password with submitted password
        if(password_verify($formPass, $hashedPass)){
            //details correct
            //store in session
            $_SESSION['loggedInUser'] = $name;

            //redirect user to client page
            header("location: client.php"); 
        }else{
            //password didn't verify
            //error message
            $loginError = "<div class='alert alert-danger'>Wrong username / password combination. Try again.</div>";
        }
    }else{
            $loginError = "<div class='alert alert-danger'>No such user in database. Please try again.<a class='close' data-dismiss='alert'>&times;</a></div>";
    }
    mysqli_close($conn);
}

include("./includes/header.php");


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

        <link rel="stylesheet" href="../css/bootstrap.min.css">    
        <link rel="stylesheet" href="../css/style.css"> 

    </head>
    <body>

    <div class="well"  style="margin: 5%; background-color: #4D6D9A; border: none;" >
    <div class="well" style="background-color:#99CED3; border: none; margin-left: 10%; width: 80%;">

      <div class="container text-center well" style="padding-bottom: 7%; border: none; color: #5F6366; background-color: #88B3D1; border-radius:2%; width:95%;">
            <h1 style="font-family: lucida;">Login</h1>
            <p style="font-family: lucida;"class="lead">Use This Form To Log Into Your Account.</p> 
            <?php echo $loginError;?>


                <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    
                    <div class="form-group">
                        <label for="email" class="sr-only">Email</label>
                        <input type="text" class="form-control" id="login-email" placeholder="Email" name="email" value="<?php echo $formEmail; ?>">
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
        
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>                       