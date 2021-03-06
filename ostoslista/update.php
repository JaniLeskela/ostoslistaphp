<?php
require_once 'inc/headers.php';
require_once 'inc/functions.php';

$input = json_decode(file_get_contents('php://input'));
$id = filter_var($input->id,FILTER_SANITIZE_NUMBER_INT)
$description = filter_var($input->description,FILTER_SANITIZE_STRING);

try{
    
    $db = openDB()
    $query = $db-prepare('update task set description=:description where id=:id');
    $query->bindValue(':description', $description,PDO::PARAM_STR);
    $query->bindValue(':id',$id,PDO::PRAAM_INT);
    $query->execute();

    $data = array('id' => $id,'description' => $description);
print json_encode($data);
} catch (PDOException $pdoex) {
   returnError($pdoex);
}