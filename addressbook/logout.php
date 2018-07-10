<?php
session_start();

include('includes/functions.php');
$_SESSION['loggedInUser'] = $name;
include('includes/header.php');
//did the user's browser send for a cookie
if(isset($_COOKIE[session_name()])){

    //empty cokkie
    setcookie(session_name(), '', time()-86400, '/');

}
//clear all session variables
session_unset();

//destroy the session
session_destroy();


?>
<h1>Logged Out</h1>
<p class="lead">You have been logged out. See you next time!</p>

<?php

include('includes/footer.php');

?>