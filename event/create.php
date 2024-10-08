<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../config/database.php';
  
// instantiate event object
include_once '../objects/event$event.php';
  
$database = new Database();
$db = $database->getConnection();
  
$event = new event($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
  
// make sure data is not empty
if(
    !empty($data->title) &&
    !empty($data->location) &&
    !empty($data->description) 
     ){
  
    // set event property values
    $event->title = $data->title;
    $event->location = $data->location;
    $event->description = $data->description;
    $event->created_at = date('Y-m-d H:i;s');
    $event->updated_at = date('Y-m-d H:i:s');
  
    // create the event$event
    if($event->create()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "event$event was created."));
    }
  
    // if unable to create the event$event, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create event$event."));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create event$event. Data is incomplete."));
}
?>