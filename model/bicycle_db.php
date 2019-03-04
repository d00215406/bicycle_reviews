<?php
function get_products() {
    global $db;
    $query = 'SELECT * FROM bicycles
              ORDER BY bicycleID';
    $statement = $db->prepare($query);
    $statement->execute();
    $bicycles = $statement->fetchAll();
    $statement->closeCursor();
    return $bicycles;
}

function get_products_by_category($type_id) {
    global $db;
    $query = 'SELECT * FROM bicycles
              WHERE bicycles.typeID = :category_id
              ORDER BY bicycleID';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $type_id);
    $statement->execute();
    $bicycles = $statement->fetchAll();
    $statement->closeCursor();
    return $bicycles;
}

function get_product($bicycle_id) {
    global $db;
    $query = 'SELECT * FROM bicycles
              WHERE bicycleID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":product_id", $bicycle_id);
    $statement->execute();
    $bicycle = $statement->fetch();
    $statement->closeCursor();
    return $bicycle;
}

function delete_product($bicycle_id) {
    global $db;
    $query = 'DELETE FROM bicycles
              WHERE bicycleID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $bicycle_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_product($type_id, $code, $name, $price) {
    global $db;
    $query = 'INSERT INTO bicycles
                 (typeID, bicycleCode, bicycleName, listPrice)
              VALUES
                 (:category_id, :code, :name, :price)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $type_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();
}

function update_product($bicycle_id, $type_id, $code, $name, $price) {
    global $db;
    $query = 'UPDATE bicycles
              SET typeID = :category_id,
                  bicycleCode = :code,
                  bicycleName = :name,
                  listPrice = :price
               WHERE bicycleID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $type_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':product_id', $bicycle_id);
    $statement->execute();
    $statement->closeCursor();
}
?>