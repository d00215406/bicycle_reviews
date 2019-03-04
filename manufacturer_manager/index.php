

<?php

require('../model/database.php');
require('../model/manufacturer_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_manufacturer';
    }
}



if ($action == 'list_manufacturer') {
    // Get the current role ID
    $manufacturer_id = filter_input(INPUT_GET, 'army_id', FILTER_VALIDATE_INT);
    if ($manufacturer_id == NULL || $manufacturer_id == FALSE) {
        $manufacturer_id = 1;
    }

  
    $manufacturer_name = get_manufacturer_name($manufacturer_id);
    $manufacturers = get_manufacturers();

    include('manufacturer_list.php');
    
}
 else if ($action == 'show_add_manufacturer') {
    $manufacturers = get_manufacturers();
    include('manufacturer_add.php');
 }
 else if ($action == 'show_edit_manufacturer') {
    $manufacturer_id = filter_input(INPUT_POST, 'manufacturer_id', FILTER_VALIDATE_INT);
    if ($manufacturer_id == NULL || $manufacturer_id == FALSE)
    {
        $error = "Missing or incorrect army id.";
        include('../errors/error.php');
    }
    else
    {
        $manufacturer = get_manufacturers($manufacturer_id);
        include('manufacturer_edit.php');
    }
 }
 
else if ($action == 'delete_manufacturer') {
    $manufacturer_id = filter_input(INPUT_POST, 'manufacturer_id', 
            FILTER_VALIDATE_INT);
   }
    if ($manufacturer_id == NULL || $manufacturer_id == FALSE) {
        $error = "Missing or incorrect product id or category id.";
        include('../errors/error.php');
    } else { 
        delete_manufacturer($manufacturer_id);
    }



if ($action == 'add_manufacturer') {
    include('manufacturer_add.php');

    $name = filter_input(INPUT_POST, 'name');
    $site = filter_input(INPUT_POST, 'site');

    add_manufacturer($name, $site);
}

if ($action == 'edit_manufacturer') {
    
    $manufacturer_id = filter_input(INPUT_POST, 'manufacturer_id', FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');
    $site = filter_input(INPUT_POST, 'site');

    // Validate the inputs
    if ($manufacturer_id == NULL || $manufacturer_id == FALSE || $name == NULL || $site == NULL)
    {
        $error = "Invalid army data. Check all fields and try again.";
        include('../errors/error.php');
    }
    else
    {
        update_manufacturer($manufacturer_id, $name, $site);

        // Display the member List page for the current role
        header("Location: .?manufacturer_id=$manufacturer_id");
    }
    
   
}













?>