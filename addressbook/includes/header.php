<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=EDGE">
        <meta name="viewport" content="width=widthdevice, initial-scale=1">

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">

        <title>My Client Addressbook</title>
    </head>
    <body style="padding-top: 60px;font-family: Lucida;">
        <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="toggle" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    
                    </button>
                    <a class="navbar-brand" href="client.php">CLIENT<strong>MANAGER</strong></a>

                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">

                    <?php
                        if($_SESSION['loggedInUser']){//user is logged in
                    ?>

                    <ul class="nav navbar-nav">
                        <li><a href="client.php">My Client</a></li>
                        <li><a href="add.php">Add Client</a></li>
                    </ul> 

                    <ul class="nav navbar-nav navbar-right">
                        <p class="navbar-text">Aloha, Onyi!</p>
                        <li><a href="logout.php">Log out</a></li>
                    </ul> 

                    <?php
                        }else{
                    ?>
                            <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Log in</a></li>
                            </ul> 
                    <?php
                        }
                    ?>
                </div> 
            
            </div>
        
        </nav>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>    
    </body>
</html>