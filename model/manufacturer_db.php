<?php
function get_manufacturer() {
    global $db;
    $query = 'SELECT * FROM manufacturers
              ORDER BY manufacturerID';
    $statement = $db->prepare($query);
    $statement->execute();
    $manufacturers = $statement->fetchAll();
    $statement->closeCursor();
    return $manufacturers;
}

function add_manufacturer($manufacturerName, $manufacturerSite) {
    global $db;
    $query = 'INSERT INTO manufacturers
                 (manufacturerName, manufacturerSite)
              VALUES
                 (:name, :site)';
    $statement = $db->prepare($query);

    $statement->bindValue(':name', $manufacturerName);
    $statement->bindValue(':site', $manufacturerSite);

    $statement->execute();
    $statement->closeCursor();
}
?>

