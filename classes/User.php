<?php

require_once 'Database.php';

class User extends Database {
    //store the user information
    public function store($request) {
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $password = $request['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (`first_name`, `last_name`, `username`, `password`)
        VALUES ('$first_name', '$last_name', '$username', '$password')
        ";

        if($this->conn->query($sql)){
            header('location: ../views/login.php');//go to index.php
        }else{
            die('Error creating the user: ' . $this->conn->error);
        }
    } 
    //login method
    public function login($request) {
        $username = $request['username'];
        $password = $request['password'];

        $sql = "SELECT * FROM users WHERE username = '$username'";

        $result = $this->conn->query($sql);

        if($result->num_rows == 1){
            //check if the password is correct
            $user = $result->fetch_assoc();
            //$user = ['id' => 1, 'username' => 'tsuji', 'password' => '$2y$10$3Z6' ]

            if(password_verify($password,$user['password'])){
                //SESSION
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['first_name'] = $user['first_name'];
                
                header("location: ../views/dashboard.php");
                    exit;

                }else{
                    die('Password is incorrect');
                }
            }else{
                die('Username not found');
            }
    } 
    //logout method
    public function logout() {
        session_start();
        session_unset();
        session_destroy();

        header('location: ../views/login.php');
        exit;
    }

    //store the product information in the database
    public function addproduct($request) {
        $product_name = $request['product_name'];
        $price = $request['price'];
        $quantity = $request['quantity'];

        $sql = "INSERT INTO products (`product_name`, `price`, `quantity`)
        VALUES ('$product_name', '$price', '$quantity')
        ";

        if($this->conn->query($sql)){
            header('location: ../views/dashboard.php');
        }else{
            die('Error creating the product: ' . $this->conn->error);
        }
    }
    //get products information from the database
    public function getProduct() {
        $sql = "SELECT * FROM products";
        
        if ($result = $this->conn->query($sql)) {
            return $result;
        
        } else {
            die('Error retrieving product: ' . $this->conn->error);
        }
    }
    //get the product information from the database
    public function getProduct_buy($id) {
        $sql = "SELECT * FROM products WHERE id = $id";
        
        if ($result = $this->conn->query($sql)) {
            return $result;
        
        } else {
            die('Error retrieving product: ' . $this->conn->error);
        }
    }
    //update the product information
    public function update($request){
        $product_id = $_SESSION['product_id'];
        $product_name = $request['product_name'];
        $price = $request['price'];
        $quantity = $request['quantity'];

        $sql = "UPDATE products SET product_name = '$product_name', price = '$price', quantity = '$quantity' WHERE id = $product_id";
        if($this->conn->query($sql)){
            header('location: ../views/dashboard.php');
            exit;
        }else{
            die('Error updating the product: ' .$this->conn->error);
        }
    }

    //delete the product information
    public function delete(){
        session_start();
        $product_id = $_SESSION['product_id'];

        $sql = "DELETE FROM products WHERE id = $product_id";

        if($this->conn->query($sql)){
            header('location: ../views/dashboard.php');
        }else{
            die('Error deleting your products:' . $this->conn->error);
        }
    }
    //buy product method store the data 
    public function buyProduct($request) {
        $id = $_SESSION['product_id'];
        $_SESSION['buy_quantity'] = $request;

        $sql = "SELECT * FROM products WHERE id = $id";
        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            die('Error retrieving product: ' . $this->conn->error);
        }
        }
    //
    public function payProduct($request) {
        $id = $_SESSION['product_id'];
        $pay_quantity = $_SESSION['buy_quantity'];
        $sql = "SELECT * FROM products WHERE id = $id";
        
        if ($result = $this->conn->query($sql)) {
                $product = $result->fetch_assoc();
                $quantity_update = $product['quantity']-$pay_quantity;
                $sql_update = "UPDATE products SET quantity = '$quantity_update' WHERE id = $id";
                if ($this->conn->query($sql_update)) {
                    header('location: ../views/dashboard.php');
                    exit;
        
                } else {
                    die('Error updating product: ' . $this->conn->error);
                }
        }else {
            die('Error retrieving product: ' . $this->conn->error);
        }
    }
}
?>