<?php

function get_service($db, $service){
    $query="SELECT description, time FROM services WHERE id=$service";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result;
}

function get_services($db){
    $query="select * from services;";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result;
}

//function get_times($db, $date){
//    if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)) {
//        $query = "select DATE_FORMAT(date,'%H:%i:%s') date, time from appointments inner join services on id = serviceId where date(date) = '$date'";
//        $statement = $db->prepare($query);
//        $statement->execute();
//        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
//        $statement->closeCursor();
//        return $result;
//    }
//}

function time_interval_contains_value($db, $date, $start, $end){
    if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)) {
        $query = "select date from appointments where date between '" . $date . " " . $start . "' and '" . $date . " " . $end . "';";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $result;
    }
}

function get_available_times($db, $date){
    $availableTimes = array();

    //open 8am - 4pm
    for($i = date('H:i',strtotime("08:00:00")); $i != date('H:i',strtotime("16:00:00")); $i = date('H:i', strtotime('+30 minutes', strtotime($i)))){
        //30 min increments

        $proposedStart = $i;
        $proposedEnd = date('H:i', strtotime('+30 minutes', strtotime($i)));
        $foundScheduleTime = time_interval_contains_value($db, $date, $proposedStart, $proposedEnd);

        if(!$foundScheduleTime){
            array_push($availableTimes, $proposedStart);
        }
    }

    return $availableTimes;
}