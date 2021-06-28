<?php
    /**
     * Shop class
     * Tracks the cart object and productList.
     */
    class ShopApp{
        public $cart;
        public $productList;

        /**
         * Default constructor
         *
         * @param [Cart] $cart
         * @param [ProductList] $productList
         */
        public function __construct(
            $cart, $productList
        ){
            $this->cart = $cart;
            $this->productList = $productList;
        }

        /**
         * Adds 'clicked' items to cart.
         * 
         * @return void
         */
        public function addToCart(){
            foreach($this->productList->products as $product){
                if(isset($_GET[$product->getAddLink()])){
                    $this->cart->addToCart($product);
                }
            }
        }

        /**
         * Removes the items from the cart
         *
         * @return void
         */
        public function removeFromCart(){
            foreach($this->cart->cartProducts as $product){
                if(isset($_GET[$product->getRemoveLink()])){
                    $this->cart->removeFromCart($product);
                    header("Refresh:0; url=cartPage.php");
                }
            }
        }

        /**
         * Display the contents of the Cart in the shop
         * in html.
         *
         * @return void
         */
        public function displayCart(){
            $this->cart->display();
        }

        /**
         * Display the contents of the Listed products
         * in the shop in html.
         *
         * @return void
         */
        public function displayProducts(){
            $this->productList->display();
        }
    }
?>