<?php

//include 'classes/DBConnect.php';
require('vendor/autoload.php');
//include_once './constants.php';
require('common.php');
//require('./auth.php');

header('meta charset="UTF-8"');
echo '<title>'.PROJECT_NAME.'</title>';

#<!-- Bootstrap core CSS -->
echo '<link href="css/bootstrap.min.css" rel="stylesheet">';
#<!-- Bootstrap theme -->
echo '<link href="css/bootstrap-theme.min.css" rel="stylesheet">';

#<!-- Custom styles for this template -->
echo '<link href="css/poker.css" rel="stylesheet">';

// At the top of the page we check to see whether the user is logged in or not 
if (empty($_SESSION['user'])) {
    // If they are not, we redirect them to the login page. 
    header("Location: login.php");

    // Remember that this die statement is absolutely critical.  Without it, 
    // people can view your members-only content without logging in. 
    die("Redirecting to login.php");
}
?>


