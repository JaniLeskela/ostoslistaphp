<?php
require_once 'inc/headers.php';
require_once 'inc/functions.php';

try{

    $db = openDB();

    $sql = "select * from shoppinglist";
    $query = $db->query($sql);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    print json_encode($results);
} catch (PDOException $pdoex) {
    returnError($pdoex);
}