<!DOCTYPE html>
<html>
<title>Products</title>
<h1>Products</h1>
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
    //include necessary objects
    include_once 'ShopApp.php';
    include_once 'ProductList.php';
    include_once 'Product.php';
    include_once 'Cart.php';
    //start session
    session_start();
    //load saved session if exists
    if(isset($_SESSION['shop'])){
        $shop = $_SESSION['shop'];
        $shop->displayProducts();
        $shop->addToCart();
        //$shop->cart->addToCart(new ListedProduct('Test test', 3.3));
        $_SESSION['shop'] = $shop;
    }
?>
<style>
    table, th, td{
        border: 1px solid black;
    }
</style>