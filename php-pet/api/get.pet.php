<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../config/database.php';

include_once '../objects/pet.php';

$database = new Database(); 
$db = $database->getConnection(); 

$pet = new Pet($db); 

if (

    !empty($data->name) &&
    !empty($data->color) &&
    !empty($data->bread) &&
    !empty($data->is_checkin_in) 

) {

    $pet->name = $data->name; 
    $pet->color = $data->color; 
    $pet->breed = $data->breed; 
    $pet->check_in = $data->check_in; 


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




