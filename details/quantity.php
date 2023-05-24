<?php
session_start();
if(isset($_POST['qq'])){
    $total = 0;

    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    
    $total = $price * $quantity;

    if(isset($_SESSION['calQuantity'])){
        $_SESSION['calQuantity']=$total;
    }else{
        $_SESSION['calQuantity']=0;
    }

    

    header("Location: cart.php");

}