<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../database/database.php';
// instantiate Owner object
include_once '../objects/owner.php';


$database = new Database();
$db = $database->getConnection();
$owner = new Owner($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));
// make sure data is not empty

if (
    !empty($data->name) &&
    !empty($data->pet_id)
) {
    // set product property values
    $owner->name = $data->name;
    $owner->pet_id = $data->pet_id;

    // create the product
    if ($owner->create()) {
        // response with 201
        http_response_code(201);
        // message Owner was created
        echo json_encode(array("message" => "Owner was created."));
    }
   
    else {
        // response w/ code - 503 service unavailable
        http_response_code(503);
        // message to user
        echo json_encode(array("message" => "Unable to create Owner."));
    }
}

else {
    // set response code - 400 bad request
    http_response_code(400);
    // tell the user
    echo json_encode(array("message" => "Unable to create Owner. Data is incomplete."));
}