

<?php

require('../model/manufacturer_db.php');

// // Display the product list
//    
//
//    $product_id = filter_input(INPUT_POST, 'product_id', 
//            FILTER_VALIDATE_INT);
//    if ($product_id == NULL || $product_id == FALSE) {
//        $error = "Missing or incorrect product id.";
//        include('../errors/error.php');
//    } else { 
//        $product = get_manufacturer($product_id);
//        
//    }





include('manufacturer_add.php');


$name = filter_input(INPUT_POST, 'name');
$site = filter_input(INPUT_POST, 'site');


add_mnaufacturer($name, $site);
?>