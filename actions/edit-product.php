<?php
session_start();
include "../classes/User.php";

$user = new User;

$user->update($_POST);
?>