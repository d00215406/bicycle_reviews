<?php
function get_categories() {
    global $db;
    $query = 'SELECT * FROM types
              ORDER BY typeID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_category_name($type_id) {
    global $db;
    $query = 'SELECT * FROM types
              WHERE typeID = :category_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $type_id);
    $statement->execute();    
    $type = $statement->fetch();
    $statement->closeCursor();    
    $type_name = $type['typeName'];
    return $type_name;
}

function add_category($name) {
    global $db;
    $query = 'INSERT INTO types (typeName)
              VALUES (:name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();    
}

function delete_category($type_id) {
    global $db;
    $query = 'DELETE FROM types
              WHERE typeID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $type_id);
    $statement->execute();
    $statement->closeCursor();
}
?>