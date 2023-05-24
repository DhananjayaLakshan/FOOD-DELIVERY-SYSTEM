<?php 
session_start();
include('../includes/dbh.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="admin.css">
    <script src="admin.js"></script>
    <title>Admin Home</title>
</head>
<body>
    <!--main secsion start-->
    <div class="manu center">
        
        <div class="wrapper">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="manage.admin.php">USERS</a></li>
                <li><a href="manage.category.php">CATEGORY</a></li>
                <li><a href="manage.food.php">FOOD</a></li>
                <li><a href="manage.order.php">ORDER</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </div>

    </div>
    <!--main secsion end-->