<?php
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

//still not working
//function get_manufacturer($product_id) {
//    global $db;
//    $query = 'SELECT * FROM manufacturers
//              WHERE manufacturerID = :product_id';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":product_id", $product_id);
//    $statement->execute();
//    $product = $statement->fetch();
//    $statement->closeCursor();
//    return $product;
//}


function get_manufacturers() {
    global $db;
    $query = 'SELECT * FROM manufacturers
              ORDER BY manufacturerID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}


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
// still not working
function update_manufacturer($manufacturer_id, $name, $site) {
    global $db;
    $query = 'UPDATE manufacturers
              SET manufacturerName = :name,
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

