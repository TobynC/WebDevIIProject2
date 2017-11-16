<?php

function get_service($db, $service){
    $query="SELECT description, time FROM services WHERE id=$service";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result;
}