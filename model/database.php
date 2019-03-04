<?php
    $dsn = 'mysql:host=mysql02host.comp.dkit.ie;dbname=D00215406';
    $username = 'D00215406';
    $password = 'JmeSu!5W';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>