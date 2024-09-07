<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and model files
include_once '../config/database.php';
include_once '../model/event.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare event object
$event = new event($db);
  
// get id of event to be edited
$data = json_decode(file_get_contents("php://input"));
  
// set ID property of event to be edited
$event->id = $data->id;
  
// set event property values
$event->title = $data->title;
$event->location = $data->location;
$event->description = $data->description;

// update the event
if($event->update()){
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array("message" => "event was updated."));
}
  
// if unable to update the event, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update event."));
}
?>