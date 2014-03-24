<?php

//if(!isset($_COOKIE["nazev_cookie"])){
//    SetCookie("nazev_cookie", "hodnota", time() + 10 * 60);
//    //echo '<p>Cookie nastavena '.$_COOKIE['nazev_cookie'].'</p>';
//} else {
//    //echo '<p>Hodnota nasi cookie je '.$_COOKIE['nazev_cookie'].'</p>';
//}

if (!IsSet($_SERVER["PHP_AUTH_USER"])) {
//if (!IsSet($_COOKIE["admin_id"])) {
    Header("WWW-Authenticate: Basic realm=\"Only admin\"");
    Header("HTTP/1.0 401 Unauthorized");
    echo "Přístup pouze na uživatelské jméno a heslo.";
    exit;
} else {
    $connection = new DBConnect();
    $connection->connect();

    $result = $connection->findAdmin($_SERVER["PHP_AUTH_USER"], $_SERVER["PHP_AUTH_PW"]);
    if (!is_null($result)) {
        $adminRecord = @mysql_fetch_array($result);
//        if (!isset($adminRecord['id'])) {
//            //$connection->insertNewAdmin('root', 'toor');
//            echo print_r(error_get_last());
//            echo 'Neplatne prihlasovaci jméno nebo heslo.';
//            exit;
//        } else {
        setcookie("admin_id", $adminRecord['id'], time() * 10 * 60);
        setcookie("admin_name", $adminRecord['name'], time() * 10 * 60);
//        }
    } else {

        //$connection->insertNewAdmin('root', 'toor');
        echo print_r(error_get_last());
        echo 'Neplatne prihlasovaci jméno nebo heslo.';
        exit;
    }

//    if ($_SERVER["PHP_AUTH_USER"] != "root") {
//        echo "Neplatné přihlašovací jméno!";
//        exit;
//    }
//    if ($_SERVER["PHP_AUTH_PW"] != "toor") {
//        echo "Neplatné heslo!";
//        exit;
//    }
    //unset($_SERVER["PHP_AUTH_USER"]);
    //unset($_SERVER["PHP_AUTH_PW"]);
}
?>

