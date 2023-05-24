<?php

function emptyInputSignup($username, $email, $pwd, $pwdRepeat)
{
    if(empty($username) || empty($email) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
   }
   else
   {
        $result = false;
   }
   return $result;
}

function invalidUid($username)
{
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
   }
   else
   {
        $result = false;
   }
   return $result;
}

function invalidEmail($email)
{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
   }
   else
   {
        $result = false;
   }
   return $result;
}

function pwdMatch($pwd, $pwdRepeat)
{
    if($pwd !== $pwdRepeat)
    {
        $result = true;
    }
   else
   {
        $result = false;
   }
   return $result;
}

function uidExists($conn, $username, $email)
{
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../signup/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn,  $username, $email, $pwd)
{
    $sql = "INSERT INTO users (usersUid, usersEmail, usersPwd) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../signup/signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $username,$email,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: ../signup/signup.php?error=none");
    exit();

}


//login
function emptyInputLogin( $username, $pwd)
{
    if(empty($username) || empty($pwd) ){
        $result = true;
   }
   else
   {
        $result = false;
   }
   return $result;
}


function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false){
        header("Location: ../main/main.php#learnMore?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("Location: ../main/main.php#learnMore?error=password");
        exit();
    }
    
    else if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = $_POST["uid"];
        
        $sql = "SELECT * FROM users WHERE usersUid = '".$username."';";

        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

        if($row["usersUid"] == "Admin"){
            header("Location: ../admin/index.php");
            exit();
        }
        else{
            session_start();
            $_SESSION["userid"] = $uidExists["usersId"];
            $_SESSION["useruid"] = $uidExists["usersUid"];
    
            header("Location: ../details/detail.php");
            exit();
        }
    }

}