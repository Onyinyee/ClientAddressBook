<?php
    include("connection.php");

    $name = $email = $password = $nameError = $emailError = $passwordError = "";
    
   
    if(isset($_POST['add'])){

        //Create A Function To Store The Form Data
        function validateFormData( $FormData){
            $FormData = trim(stripslashes(htmlspecialchars( $FormData )));
            return $FormData;

        }

     
       
    
    
        if(!$_POST["username"]){
            $nameError = "Please enter a username<br>";
        }else{
            //call the function with formdata
            $name = validateFormData($_POST["username"]);
        }
            
        if(!$_POST["email"]){
            $emailError = "Please enter an email<br>";
        }else{
            //call the function with formdata
            $email = validateFormData($_POST["email"]);
        }
            
        if(!$_POST["password"]){
            $passwordError = "Please enter a password<br>";
        }else{
            //call the function with formdata
            $password = validateFormData($_POST["password"]);
        }
        
        if( $name && $email && $password){
            

            $query = "INSERT INTO users( id, username, email, password, date_time, biography) VALUES(NULL, '$name', '$email', '$password', CURRENT_TIMESTAMP, NULL)";
        
        if(mysqli_query($conn, $query)){
            echo "<div class='alert alert-success'>Record has been added successfully</div>";
        }else{
            echo "connection Error" . $query . "<br>" . mysqli_error($conn);
        }

        }

    
    
    

        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width initial-scale=1">

        <title>Client Address Book</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <h1>Address Book</h1>
        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">

            <small class="text-danger">*<?php echo $nameError; ?></small>
            <input type="text" name="username" placeholder="Username"><br><br>
            <small class="text-danger">*<?php echo $emailError; ?></small>
            <input type="text" name="email" placeholder="Email"><br><br>
            <small class="text-danger">*<?php echo $passwordError; ?></small>
            <input type="password" name="password" placeholder="Password"><br><br>

            <input type="submit" name="add" value="Add User"><br><br>
        </form>        
        
    </body>
</html>