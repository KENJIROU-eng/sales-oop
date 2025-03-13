<?php
session_start();
include "../classes/User.php";

//Create an object of the User class
$user = new User();

//Call the register method
$user->buyProduct($_POST['buy_quantity']); 
if($user->buyProduct($_POST['buy_quantity'])){
    header('location: ../views/pay-product.php');
    exit;
}
?>