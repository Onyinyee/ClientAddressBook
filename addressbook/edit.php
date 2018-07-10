<?php
    session_start();

    //if not logged in
    if(!$_SESSION['loggedInUser']){

    //redirect to login page
        header('location: index.php');
    }

        //get ID sent by GET collection
        $clientID   = $_GET['id'];

        //connect to database
        include('includes/connection.php');

        //include functions file
        include('includes/functions.php');

        //query the database with client ID
        $query  = "SELECT * FROM clients where id='$clientID'";
        $result = mysqli_query($conn, $query);

        //check connection
        if(mysqli_num_rows($result) > 0){

        //we have data
        //set some variables
            while($row = mysqli_fetch_assoc($result)){
                $clientName     = $row['name'];
                $clientEmail    = $row['email'];
                $clientPhone    = $row['phone'];
                $clientAddress  = $row['address'];
                $clientCompany  = $row['company'];
                $clientNotes    = $row['notes'];

            }
        }else{
        //no results
            echo "<div class='alert alert-danger'>There is nothing to see here<a href='client.php'>Head Back<a></div>";
        }

        //if submit button was clicked
        if(isset($_POST['update'])){

        //set variables 
            $clientName         = validateFormData($_POST['clientName']);
            $clientEmail        = validateFormData($_POST['clientEmail']);
            $clientPhone        = validateFormData($_POST['clientPhone']);
            $clientAddress      = validateFormData($_POST['clientAddress']);
            $clientCompany      = validateFormData($_POST['clientCompany']);
            $clientNotes        = validateFormData($_POST['clientNotes']);

        //new database query and result
            $query  = "UPDATE clients
                    SET     name    ='$clientName',
                            email   ='$clientEmail',
                            phone   ='$clientPhone',
                            address ='$clientAddress',
                            company ='$clientCompany',
                            notes   ='$clientNotes'
                    WHERE   id      ='$clientID'";

            $result = mysqli_query($conn, $query);

            if($result){
        //redirect to client page with query string
                header('location: client.php?alert=updatesuccess');
            }else{
                echo "Error updating record: ". mysqli_error($conn);
            }
        }
        
        if(isset($_POST['delete'])){

            $alertMessage = "<div class='alert alert-danger'>
                                <p>Are you sure you want to delete this client? No take backs</p><br>
                                <form action='". htmlspecialchars($_SERVER["PHP_SELF"])."?id=$clientID' method='post'>
                                <input type='submit' class='btn btn-danger btn-sm' name='confirm-delete' value='Yes, delete'>
                                <a type='button' class='btn btn-danger btn-sm' data-dismis='alert'>Oops, no thanks!</a>
                                </form>
                            </div>";

             }
            
        if(isset($_POST["confirm-delete"])){

            //new database query and result
            $query  = "DELETE FROM clients WHERE id = '$clientID'";
            $result = mysqli_query($conn, $query);

            if($result){

                //redirect user to client page with query string
                header("location: client.php? alert=deleted");

            }else{

                echo "Error updating record: ". mysqli_error($conn);

            }
        }
        mysqli_close($conn);

    

    include("includes/header.php");
?>
<h1>Edit Client</h1>
<?php echo $alertMessage; ?>
<form class="row" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?id=<?php echo $clientID; ?>" method="post">
    <div class="form-group col-sm-6">
        <label for="client-name">Name</label>
        <input type="text" class="form-control input-lg" id="client-name" name="clientName" value="<?php echo $clientName; ?>">
    </div>

    <div class="form-group col-sm-6">
        <label for="client-email">Email</label>
        <input type="text" class="form-control input-lg" id="client-email" name="clientEmail" value="<?php echo $clientEmail; ?>">
    </div>

    <div class="form-group col-sm-6">
        <label for="client-phone">Phone</label>
        <input type="text" class="form-control input-lg" id="client-phone" name="clientPhone" value="<?php echo $clientPhone; ?>" >
    </div>

    <div class="form-group col-sm-6">
        <label for="client-Address">Address</label>
        <input type="text" class="form-control input-lg" id="client-address" name="clientAddress" value="<?php echo $clientAddress;?>">
    </div>

    <div class="form-group col-sm-6">
        <label for="client-company">Company</label>
        <input type="text" class="form-control input-lg" id="client-company" name="clientCompany" value="<?php echo $clientCompany; ?>">
    </div>

    <div class="form-group col-sm-6">
        <label for="client-notes">Notes</label>
        <textarea type="text" class="form-control input-lg" id="client-notes" name="clientNotes"><?php echo $clientNotes; ?></textarea>
    </div>

    <div class="form-group col-sm-12">
        <hr>
        <button type="submit" class="btn btn-lg btn-danger pull-left" name="delete">Delete</button>
        <div class="pull-right">
            <a href="client.php" class="btn btn-default btn-lg" type="button">Cancel</a>
            <button type="submit" name="update" class="btn btn-lg btn-success">Edit Client</button>
        </div>
    </div>

</form>

<?php
    include('includes/footer.php');
?>