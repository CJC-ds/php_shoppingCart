<!DOCTYPE html>
<html>
<title>My Cart</title>
<h1>My Cart</h1>
<body>
<nav>
    <ul>
        <li>
            <a href="index.php">
                <h1>Home</h1>
            </a>
        </li>
        <li>
            <a href="productPage.php">
                <h1>Products</h1>
            </a>
        </li>
        <li>
            <a href="cartPage.php">
                <h1>My Cart</h1>
            </a>
        </li>
    </ul>
</nav>
</body>
</html>
<?php
    // include required objects
    include_once 'ShopApp.php';
    include_once 'ProductList.php';
    include_once 'Cart.php';
    // create a session
    session_start();
    // load previous session if exists
    if(isset($_SESSION['shop'])){
        $shop = $_SESSION['shop'];
        $shop->displayCart();
        $shop->removeFromCart();
        $_SESSION['shop'] = $shop;
    }
?>
<style>
    table, th, td{
        border: 1px solid black;
    }
</style>