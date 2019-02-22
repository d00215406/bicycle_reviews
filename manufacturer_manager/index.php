

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



if ($action == 'add_manufacturer') {
    include('manufacturer_add.php');

    $name = filter_input(INPUT_POST, 'name');
    $site = filter_input(INPUT_POST, 'site');

    add_manufacturer($name, $site);
}

if ($action == 'edit_manufacturer') {
    $manufacturer_id = filter_input(INPUT_POST, 'manufacturerID');
    $name = filter_input(INPUT_POST, 'name');
    $site = filter_input(INPUT_POST, 'site');

    update_product($manufacturer_id, $name, $site);
}
?>