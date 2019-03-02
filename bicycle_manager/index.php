<?php
require('../model/database.php');
require('../model/bicycle_db.php');
require('../model/type_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}

if ($action == 'list_products') {
    // Get the current category ID
    $type_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($type_id == NULL || $type_id == FALSE) {
        $type_id = 1;
    }
    
    // Get product and category data
    $type_name = get_category_name($type_id);
    $types = get_categories();
    $products = get_products_by_category($type_id);

    // Display the product list
    include('bicycle_list.php');
} else if ($action == 'show_edit_form') {
    $product_id = filter_input(INPUT_POST, 'product_id', 
            FILTER_VALIDATE_INT);
    if ($product_id == NULL || $product_id == FALSE) {
        $error = "Missing or incorrect product id.";
        include('../errors/error.php');
    } else { 
        $product = get_product($product_id);
        include('bicycle_edit.php');
    }
} else if ($action == 'update_product') {
    $product_id = filter_input(INPUT_POST, 'product_id', 
            FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

    // Validate the inputs
    if ($product_id == NULL || $product_id == FALSE || $type_id == NULL || 
            $type_id == FALSE || $code == NULL || $name == NULL || 
            $price == NULL || $price == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_product($product_id, $type_id, $code, $name, $price);

        // Display the Product List page for the current category
        header("Location: .?category_id=$type_id");
    }
} else if ($action == 'delete_product') {
    $product_id = filter_input(INPUT_POST, 'product_id', 
            FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($type_id == NULL || $type_id == FALSE ||
            $product_id == NULL || $product_id == FALSE) {
        $error = "Missing or incorrect product id or category id.";
        include('../errors/error.php');
    } else { 
        delete_product($product_id);
        header("Location: .?category_id=$type_id");
    }
} else if ($action == 'show_add_form') {
    $types = get_categories();
    include('bicycle_add.php');
} else if ($action == 'add_product') {
    $type_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    if ($type_id == NULL || $type_id == FALSE || $code == NULL || 
            $name == NULL || $price == NULL || $price == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_product($type_id, $code, $name, $price);
        header("Location: .?category_id=$type_id");
    }
} else if ($action == 'list_categories') {
    $types = get_categories();
    include('type_list.php');
} else if ($action == 'add_category') {
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) {
        $error = "Invalid category name. Check name and try again.";
        include('../errors/error.php');
    } else {
        add_category($name);
        header('Location: .?action=list_categories');  // display the Category List page
    }
} else if ($action == 'delete_category') {
    $type_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    delete_category($type_id);
    header('Location: .?action=list_categories');      // display the Category List page
}

?>