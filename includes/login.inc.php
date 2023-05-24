<?php

    session_start();

if  ( isset($_POST["submit"] ))
{
   
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    $_SESSION['usersession'] = $_POST["uid"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    if (emptyInputLogin( $username, $pwd) !== false)
    {
        header("Location: ../login.php?error=emptyinput");
        exit();
    }
    loginUser($conn, $username, $pwd);

}
else
{
        header("location: ../login.php");
        exit();
}

