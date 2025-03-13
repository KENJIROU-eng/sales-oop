<?php
session_start();
include "../classes/User.php";

//Create an object of the User class
$user = new User();

//Call the register method
$user->payProduct($_POST['pay_amount']); 
?>