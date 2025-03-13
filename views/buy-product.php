<?php
session_start();
require "../classes/User.php";

$_SESSION['product_id'] = $_GET['id'];
$user_obj = new User;
$products = $user_obj->getProduct_buy($_SESSION['product_id']);
$product = $products->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buy Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css' integrity='sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==' crossorigin='anonymous' referrerpolicy='no-referrer' />
</head>
<body>
    <!-- Content Here --> 
<div class="container justify-content-center mt-1">
    <h1 class="text-success">
        <i class="fa-solid fa-cash-register"></i>
        Buy Product
    </h1>
    <div class="content mt-5 w-50">
        <div class="row">
            <div class="col">
                <p>Product Name</p>
                <h3 class="fw-bold"><?=$product['product_name']?></h3>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col">
                <p>Price</p>
                <h3 class="fw-bold">$<?=$product['price']?></h3>
            </div>
            <div class="col">
                <p>Stocks Left</p>
                <h3 class="fw-bold"><?=$product['quantity']?></h3>
            </div>
        </div>
        <form action="../actions/buy-product.php" method="post">
            <div class="mt-3">
                <label for="buy_quantity" class="form-control">Buy Quantity</label>
                <input type="number" class="form-control" id="buy_quantity" name="buy_quantity" max="<?=$product['quantity']?>" min="1">
            </div>
            <button type="submit" class="btn btn-success w-100 mt-5">Buy Product</button>
        </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>