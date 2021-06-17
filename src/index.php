<?php
    // start session
    session_start();
    // set error strictness
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    // include necessary objects in external files
    include_once 'homePage.php';
    include_once 'Cart.php';
    include_once 'ShopApp.php';
    include_once 'ProductList.php';
    // check for existing session
    // load shop state.
    if(isset($_SESSION['shop'])){
        $shop = $_SESSION['shop'];
    }
    else{
        //parse the provided data into objects.
        $products = [
            [ "name" => "Sledgehammer", "price" => 125.75 ],
            [ "name" => "Axe", "price" => 190.50 ],
            [ "name" => "Bandsaw", "price" => 562.131 ],
            [ "name" => "Chisel", "price" => 12.9 ],
            [ "name" => "Hacksaw", "price" => 18.45 ],
        ];
        // Create Shop with Products.
        $shop = new ShopApp(
            new Cart(), new ProductList($products)
        );
    }

    //note to user
    echo '<p>Navigate to <b>Products</b> page to browse.</p>';
    //save shop state to session
    $_SESSION['shop'] = $shop;
    // session_destroy();
?>
<style>
    table, th, td{
        border: 1px solid black;
    }
</style>