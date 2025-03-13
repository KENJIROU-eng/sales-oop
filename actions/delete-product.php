<?php
session_start();
include "../classes/User.php";

$user = new User;
$user->delete();
?>