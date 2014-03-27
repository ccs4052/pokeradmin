<?php

// assert
assert_options(ASSERT_ACTIVE);
assert_options(ASSERT_WARNING);

//include 'classes/DBConnect.php';
require('vendor/autoload.php');
//include_once './constants.php';
require('common.php');
//require('./auth.php');

include('head_stylesheets.php');

// At the top of the page we check to see whether the user is logged in or not 
if (empty($_SESSION['user'])) {
    // If they are not, we redirect them to the login page. 
    header("Location: login.php");

    // Remember that this die statement is absolutely critical.  Without it, 
    // people can view your members-only content without logging in. 
    die("Redirecting to login.php");
}