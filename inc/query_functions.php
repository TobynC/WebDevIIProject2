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

function get_times($db, $date){
    if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)) {
        $query = "select DATE_FORMAT(date,'%H:%i:%s') date, time from appointments inner join services on id = serviceId where date(date) = '$date' order by date asc;";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $result;
    }
}

function get_appointments($db, $user){
    $query="select * from appointments WHERE username=\"$user\"";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result;
}

function get_available_times($db, $date, $appointmentDuration){
    $availableTimes = array();
    $times = get_times($db, $date);
    //adds fake appointment at end to account for closing time
    array_push($times, array('date'=>'16:00:00', 'time'=>'30'));

    //open 8am - 4pm
    for($i = date('H:i:s',strtotime("08:00:00")); $i != date('H:i:s',strtotime("16:00:00")); $i = date('H:i:s', strtotime('+30 minutes', strtotime($i)))){
        //30 min increments
        $failed = false;
        $proposedStart = $i;
        $proposedEnd = date('H:i:s', strtotime('+'.$appointmentDuration.' minutes', strtotime($i)));

        foreach ($times as $time){
            $currentRecordStart = $time['date'];
            $currentRecordEnd = date('H:i:s', strtotime('+'.$time['time']. ' minutes', strtotime($time['date'])));

            if(
                   ($proposedStart <= $currentRecordStart && $proposedEnd > $currentRecordStart && $proposedEnd < $currentRecordEnd)
                || ($proposedStart < $currentRecordEnd && $proposedEnd > $currentRecordEnd)
                || ($proposedStart > $currentRecordStart && $proposedEnd <= $currentRecordEnd)
                || ($proposedStart == $currentRecordStart)
                || ($proposedStart < $currentRecordStart && $proposedEnd == $currentRecordEnd)
              )
            {
                $failed = true;
            }
        }
        if(!$failed){
            //add to available times
            array_push($availableTimes, $i);
        }
    }

    return $availableTimes;
}