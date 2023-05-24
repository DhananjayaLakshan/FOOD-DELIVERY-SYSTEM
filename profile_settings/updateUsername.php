<?php
    session_start();
    include_once "../includes/dbh.inc.php";
    $userMail = $_SESSION['usersession'];
    $sqli = "SELECT * from users where usersEmail ='{$userMail}' OR usersUid = '{$userMail}';";
    $result = mysqli_query($conn ,$sqli );
    $record = mysqli_fetch_assoc($result);

    if(isset($_POST['submit'])){
        $newMail = $_POST['newUserName'];
        $sqlStatement = "UPDATE users SET usersUid = '{$newMail}' WHERE usersEmail ='{$userMail}' OR usersUid = '{$userMail}' ;";
        
        $result = mysqli_query($conn ,$sqlStatement );
        header("location:../main/main.php#learnMore");

    }


?>