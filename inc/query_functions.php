<?php

function get_questions($db)
{
    $query = "SELECT question_id,question_text from question";

    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result;      
}

function get_answers($db,$qid)
{
    $query = "SELECT question_id,answer_text,correct from answers where question_id='$qid'";
    
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result;      
}

function add_results($db, $cor){
  
  $query="INSERT INTO scores (datetime, correct) VALUES (NOW(), '$cor')";
  
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  $statement->closeCursor();
  return $result;
}

function get_results($db){
  $query = "SELECT datetime, correct from scores";
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  $statement->closeCursor();
  return $result;   
}