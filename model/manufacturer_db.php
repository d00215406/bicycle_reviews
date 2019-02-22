<?php
//function get_manufacturer() {
//    global $db;
//    $query = 'SELECT * FROM manufacturers
//              ORDER BY manufacturerID';
//    $statement = $db->prepare($query);
//    $statement->execute();
//    $manufacturers = $statement->fetchAll();
//    $statement->closeCursor();
//    return $manufacturers;
//}

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

