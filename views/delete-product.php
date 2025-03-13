<?php
session_start();

require "../classes/User.php";
$_SESSION['product_id'] = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delete User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css' integrity='sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==' crossorigin='anonymous' referrerpolicy='no-referrer' />
</head>
<body>
    <!-- Content Here --> 
    <nav class="navbar navbar-extend navbar-dark bg-dark" style="margin-bottom: 80px;">
        <div class="container">
            <!-- <div class="row">
                <div class="col"> -->
                    <a href="dashboard.php" class="navbar-brand">
                        <i class="fa-solid fa-house"></i>
                    </a>
                <!-- </div>
                <div class="col"> -->
                    <div class="navbar-nav">
                    <span class="navbar-text">Welcome, <?= $_SESSION['first_name'] ?></span>
                    </div>
                <!-- </div> -->
                <!-- <div class="col text-center"> -->
                    <div class="navbar-nav">
                        <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                            <button class="text-danger bg-transparent border-0">
                                <i class="fa-solid fa-user-plus"></i>
                            </button>
                        </form>
                    </div>
                <!-- </div> -->
            <!-- </div> -->
        </div>
    </nav>

    <main class="row justify-content-center gx-0">
        <div class="col-4 text-center">
            <i class="fa-solid fa-triangle-exclamation text-warning display-4 d-block mb-2"></i>
            <h2 class="text-danger mb-5">DELETE PRODUCT</h2>

            <p class="fw-bold">Are you sure want to delete your product?</p>

            <div class="row">
                <div class="col">
                    <a href="dashboard.php" class="btn btn-secondary w-100">Cancel</a>
                </div>
                <div class="col">
                    <form action="../actions/delete-product.php" method="post">
                        <button type="submit" class="btn btn-outline-danger w-100">Delete</button>
                    </form>
                </div>
            </div>            
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>