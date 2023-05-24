<?php 
include "../includes/dbh.inc.php"; 

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql= "DELETE FROM cart WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if($result == true)
    {
        echo "<script> alert('Deleted');</script>";
        header("location: manage.order.php");
    }
}

?>