<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and model files
include_once '../config/database.php';
include_once '../model/event.php';
  
// instantiate database and event object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$event = new event($db);
  
// query event
$stmt = $event->read();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // event array
    $event_arr=array();
    $event_arr["records"]=array();
  
    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        extract($row);
        $event_item=array(
            "id" => $id,
            "title" => $title,
            "description" => html_entity_decode($description),
            "location" => $location,
            "created_at" => $created_at,
            "updated_at" => $upated_at
        );
  
        array_push($event_arr["records"], $event_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show events data in json format
    echo json_encode($event_arr);
}
  
