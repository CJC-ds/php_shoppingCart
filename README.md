# ezyVet_shoppingCart

This is my attempt at ezyVet shopping cart assignment.

Unable to create the "click to add", "click to remove" functionality
with php.

The main object files start with a captial letter.

* `Cart.php`

* `Product.php`
    * `CartProduct`
    * `ListedProduct`

* `ProductList.php`

* `ShopApp.php`

Functionality for adding a product to cart works if the methods are called
manually.

This can be tested by going to `productPage` and uncommenting:

`//$shop->cart->addToCart(new ListedProduct('Test test', 3.3));`

**and/or**

`// $shop->cart->addToCart(new ListedProduct('Test2 test2', 5.8));`

In navigation click **Products** a few times and it will populate the `cartPage.php`.
