<?php
    /**
     * Cart
     * 
     * Holds cartProducts in an array.
     * Tracks total item cost.
     */
    class Cart{
        public $cartProducts;
        protected $total;

        /**
         * Defult constructor
         */
        public function __construct(){
            $this->cartProducts = array();
            $this->total = $this->getTotal();
        }

        /**
         * Checks if an ListedProduct item
         * exists in the cart.
         *
         * @param ListedProduct $product
         * @return CartProduct if exists, else False
         */
        private function itemExists(ListedProduct $product){
            $exists = FALSE;
            if (!empty($this->cartProducts)){
                foreach($this->cartProducts as $cartProduct){
                    if($cartProduct->getName() == $product->getName()){
                        $exists = $cartProduct;
                    }
                }
                reset($this->cartProducts);
            }
            return $exists;
        }

        /**
         * Computes the total cost of all items in
         * the shopping cart.
         *
         * @return float
         * The total cost.
         */
        public function getTotal(){
            $st = array();
            foreach($this->cartProducts as $product){
                $st[] = $product->getSubtotal();
            }
            return array_sum($st);
        }

        /**
         * Adds a ListedProduct to the cart.
         * If product exists, increase existing
         * CartItem quantity by 1.
         *
         * @param ListedProduct $product
         * @return void
         */
        public function addToCart(ListedProduct $product){
            $exists = $this->itemExists($product);
            if(!$exists){
                $newProduct = new cartProduct(
                    $product->getName(), 
                    $product->getPrice(), 1);
                $this->cartProducts[$newProduct->getRemoveLink()] = 
                    $newProduct;
            }
            else{
                $exists->increaseQuantity();
            }
            $this->total = $this->getTotal();
        }

        /**
         * Removes an item from the cart.
         * If more than 1, the quantity is reduced by 1.
         *
         * @param CartProduct $product
         * @return void
         */
        public function removeFromCart(CartProduct $product){
            if ($product->getQuantity() == 1){
                unset($this->cartProducts[$product->getRemoveLink()]);
            }
            else{
                $this->cartProducts[$product->getRemoveLink()]->
                    decreaseQuantity();
            }
        }

        /**
         * Displays the shopping cart in html.
         * 
         *
         * @return void
         */
        public function display(){
            echo '<table style="width:100%">
                    <caption><b>Shopping Cart</b></caption>';
            echo '<tr>
                    <th><b>Product Name</b></th>
                    <th><b>Price</b></th>
                    <th><b>Quantity</b></th>
                    <th><b>Subtotal</b></th>
                    <th><b>Remove?</b></th>
                  </tr>';
            foreach($this->cartProducts as $product){
                $product->display();
            }
            echo '</table>';
            echo '<p><b>Cart Total: '
                . number_format($this->total, 2, '.', '') .'
                    </b></p>';
        }

    }
?>