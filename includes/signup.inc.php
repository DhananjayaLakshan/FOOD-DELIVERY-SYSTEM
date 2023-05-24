<?php

if(isset($_POST["submit"])){

    //get detailes from form
    $username   =  $_POST["uid"];
    $email      =  $_POST["email"];
    $pwd        =  $_POST["pwd"];
    $pwdRepeat  =  $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';//link database
    require_once 'functions.inc.php';//link function


    if (emptyInputSignup( $username, $email, $pwd, $pwdRepeat) !== false)//function for check empty input fields
    {
        header("Location: ../signup/signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($username) !== false)//function for check username
    {
        header("Location: ../signup/signup.php?error=invaliduid");
        exit();
    }

    if (invalidEmail($email) !== false)//function for check email
    {
        header("Location: ../signup/signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false)//function for check password and confirm password
    {
        header("Location: ../signup/signup.php?error=passwordmissmatch");
        exit();
    }

    if (uidExists($conn, $username, $email) !== false)//function for check if username and email alrready exist in the database
    {
        header("Location: ../signup/signup.php?error=usernametaken");
        exit();
    }

    createUser($conn,$username,$email,$pwd);//function for insert data for database
}
else
{
    header("location: ../signup/signup.php");//rederect to signup page
    exit();
}