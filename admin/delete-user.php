<?php

include('../includes/dbh.inc.php');

//Get the ID of user to be deleted
$id = $_GET['id'];

//create sql to delete
$sql = "DELETE FROM users WHERE usersId = $id ";

//execute the query
$result = mysqli_query($conn, $sql);


//redirect

if($result == true){

    $_SESSION ['delete'] = "<div class='success'>User deleted successfully</div>";
    header("Location: manage.admin.php");
}
else{

    $_SESSION ['delete'] = "<div class='error'>Failed to delete user. Try again later</div>";
    header("Location: manage.admin.php");
}