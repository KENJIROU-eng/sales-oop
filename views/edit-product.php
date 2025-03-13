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
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css' integrity='sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==' crossorigin='anonymous' referrerpolicy='no-referrer' />
    <link rel="stylesheet" href="../assets/css/style.css">
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

    <div style="height: 100vh">
        <div class="row h-100 m-0">
            <div class="card w-50 my-auto mx-auto">
                <div class="card-header bg-white border-0 py-3">
                    <h1 class="text-center text-danger">
                        <i class="fa-solid fa-pen"></i>
                        Edit Product
                    </h1>
                </div>
                <div class="card-body">
                    <form action="../actions/edit-product.php" method="post">
                        <div class="mb-3">
                            <label for="product-name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" required>
                        </div>
                        <div class="mb-3"> 
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="mb-3"> 
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Edit Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>