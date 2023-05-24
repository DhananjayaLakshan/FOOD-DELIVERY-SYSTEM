<?php
include "../includes/dbh.inc.php";
$id = $_GET['foodid'];

$sql = "DELETE FROM cart WHERE food_id = $id";

$result = mysqli_query($conn,$sql);

header("Location: cart.php");
?>