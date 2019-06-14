<?php

//disables CORS protection, grants access to all 
header("Access-Control-Allow-Origin: *");
//designates the content to be in JSON format, encoded in the UTF-8 character encoding
header("Content-Type: application/json; charset=UTF-8");

//makes sure both files are only ran once
include_once '../database/database.php';
include_once '../objects/pet.php';


$database = new Database(); 
$db = $database->getConnection(); 

$pet = new Pet($db); 

$stmt = $pet->read();
$num = $stmt->rowCount(); 

if ( $num > 0) {

    //creating new array $pets_arr 
   $pets_arr = array();
   $pets_arr["pets"] = array();

   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $pets = array(
        "id" => $row["id"],
        "name" => $row["name"],
        "color" => $row["color"],
        "breed" => $row["breed"],
        "is_checked_in" => $row["is_checked_in"],
    );

    array_push($pets_arr["pets"], $pets);
   }
        http_response_code(200);

        echo json_encode($pets_arr);

    } else {

        http_response_code(404); 

        echo json_encode(array("message" => "no pets"));
    }

 




