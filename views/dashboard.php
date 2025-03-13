<?php

session_start();

require "../classes/User.php";

$user_obj = new User;
$products = $user_obj->getProduct();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
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
    <main class="row justify-content-center gx-0">
        <div class="row">
            <div class="col-10">
                <h2 class="text-center">
                    Product LIST
                </h2>
            </div>   
                <!-- プラスアイコン（モーダルを開くトリガー） -->
                <i class="fa-solid fa-plus text-info col-2" data-bs-toggle="modal" data-bs-target="#add-product" style="cursor: pointer"></i>
        </div>

        <table class="table table-hover align-middle">
            <thead class="bg-secondary">
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quatity</th>
                    <th><!--For action buttons--></th>
                    <th><!--For action buttons--></th>
                </tr>
            </thead>
            <?php
            if(!empty($products)){
                while($product = $products->fetch_assoc()){
            ?>
            <tbody>
                <tr>
                        <td><?=$product['id']?></td>
                        <td><?=$product['product_name']?></td>
                        <td><?=$product['price']?></td>
                        <td><?=$product['quantity']?></td>
                        <td>
                            <a href="edit-product.php?id=<?=$product['id']?>" class="btn btn-outline-warning" title="Edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <a href="delete-product.php?id=<?=$product['id']?>" class="btn btn-outline-danger" title="Delete">
                                <i class="fa-regular fa-trash-can"></i>
                            </a>
                        </td>
                        <td>
                            <a href="buy-product.php?id=<?=$product['id']?>" class="btn btn-outline-success" title="payment">
                                <i class="fa-solid fa-cash-register"></i>
                            </a>
                        </td>
                </tr>
            </tbody>
                <?php
                    }
                ?>
            <?php
                }
            ?>
        </table>
    </main>

<!-- モーダルウィンドウ -->
<div class="modal fade" id="add-product" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true" style="height: 100vh">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center text-primary" id="addProductLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../actions/addproduct.php" method="post">
                    <div class="mb-3">
                        <label for="product-name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="product-price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="mb-3"> 
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <button type="submit" class="btn btn-danger w-100">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>