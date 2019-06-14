<?php


//Cross-Origin Resource Sharing (CORS) is a mechanism 
//that uses additional HTTP headers to tell a browser to let a web application 
//running at one origin (domain) have permission to access selected resources 
// from a server at a different origin


//disables CORS protection, grants access to all 
header("Access-Control-Allow-Origin: *");
//designates the content to be in JSON format, encoded in the UTF-8 character encoding
header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Methods: POST");
// time out controller 
header("Access-Control-Max-Age: 3600");
// which HTTP headers can be used during the actual request
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



// this only runs once
include_once '../database/database.php';

include_once '../objects/pet.php';

//assigning new database
$database = new Database(); 

//$db set to new database w/ method getConnection
$db = $database->getConnection(); 

//pet set to new database w/ method getConnection
$pet = new Pet($db); 


// $stmt = $pet->read();

// use write method to write to database
$stmt = $pet->write(); 

// num set to number of rows 
$num = $stmt->rowCount(); 



if (

    !empty($data->name) &&
    !empty($data->color) &&
    !empty($data->breed) &&
    !empty($data->is_checkin_in) 

) {

    $pet->name = $data->name; 
    $pet->color = $data->color; 
    $pet->breed = $data->breed; 
    $pet->is_checkin_in = $data->is_checkin_in; 


    if ($pet->create()) {

        http_response_code(201);

        echo json_encode(array("message" => "Pet was created."));

    } else {

        http_response_code(503); 

        echo json_encode(array("message" => "Could not create pet")); 
    }

} else {

    http_response_code(400); 

    echo json_encode(array("message" => "data is incomplete"));
}

