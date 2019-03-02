<?php

// Get Manufacturers By Name
function get_manufacturer_name($manufacturer_id) {
    global $db;
    $query = 'SELECT * FROM manufacturers
              WHERE manufacturerID = :manufacturer_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':manufacturer_id', $manufacturer_id);
    $statement->execute();    
    $manufacturer = $statement->fetch();
    $statement->closeCursor();    
    $manufacturer_name = $manufacturer['manufacturerName'];
    return $manufacturer_name;
}

// Get Manufacturers
function get_manufacturers() {
    global $db;
    $query = 'SELECT * FROM manufacturers
              ORDER BY manufacturerID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

// Add Manufacturers
function add_manufacturer($name, $site) {
    global $db;
    $query = 'INSERT INTO manufacturers
                 (manufacturerName, manufacturerSite)
              VALUES
                 (:name, :site)';
    $statement = $db->prepare($query);

    $statement->bindValue(':name', $name);
    $statement->bindValue(':site', $site);

    $statement->execute();
    $statement->closeCursor();
}

// Delete Manufacturers
function delete_manufacturer($manufacturer_id) {
    global $db;
    $query = 'DELETE FROM manufacturers
              WHERE manufacturerID = :manufacturer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':manufacturer_id', $manufacturer_id);
    $statement->execute();
    $statement->closeCursor();
}

// Edit Manufacturers
function update_product($manufacturer, $name, $site) {
    global $db;
    $query = 'UPDATE bicycles
              SET manufacturerID = :manufacturer_id,
                  manufacturerName = :name,
                  manufacturerSite = :site            
               WHERE manufacturerID = :manufacturer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':manufacturer_id', $manufacturer_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':site', $site);
    $statement->execute();
    $statement->closeCursor();
}

?>

