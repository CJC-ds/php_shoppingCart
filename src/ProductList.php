<?php
include_once 'Product.php';
    /**
     * Holds a list of available products "on shelf".
     * 
     */
    class ProductList{
        public $products = [];

        /**
         * Default constructor.
         * Parses the supplied product array.
         *
         * @param array $products
         * Product array (supplied).
         */
        public function __construct(array $products){
            $pl = [];
            foreach($products as $product){
                $pl[] = new ListedProduct($product["name"],
                    $product["price"]);
            }
            foreach($pl as $product){
                $this->products[$product->getAddLink()]
                     = $product;
            }
        }

        /**
         * Displays the contents of all listed products
         * as html.
         *
         * @return void
         */
        public function display(){
            echo '<table style="width:100%">
                    <caption><b>Product List</b></caption>';
            echo '<tr>
                    <th><b>Product Name</b></th>
                    <th><b>Price</b></th>
                    <th><b>Add?</b></th>
                  </tr>';
            foreach($this->products as $product){
                $product->display();
            }
            echo '</table>';
        }
    }
?>