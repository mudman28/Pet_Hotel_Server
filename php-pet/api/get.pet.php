<?php


//Cross-Origin Resource Sharing (CORS) is a mechanism 
//that uses additional HTTP headers to tell a browser to let a web application 
//running at one origin (domain) have permission to access selected resources 
// from a server at a different origin


//disables CORS protection, grants access to all 
header("Access-Control-Allow-Origin: *");
//designates the content to be in JSON format, encoded in the UTF-8 character encoding
header("Content-Type: application/json; charset=UTF-8");

//makes sure both files are only ran once
include_once '../database/database.php';
include_once '../objects/pet.php';

// sets up new ddtabase
$database = new Database(); 

//new database calls method getConnection 
$db = $database->getConnection(); 

//$pet set to new pet database w/ connection 
$pet = new Pet($db); 

// stmt set to pet w/ read method called
$stmt = $pet->read();

// num set to stmt w/ counting the rows method
$num = $stmt->rowCount(); 

if ( $num > 0) {

    //creating new array $pets_arr 
   $pets_arr = array();

    //setting a name for the $pets_arr to pets
   $pets_arr["pets"] = array();

 // fetches a row from a result set associated a PDO statement
 //PDO::FETCH_ASSOC: returns an array indexed by column name 
 // as returned in your result set

   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


        // setting the values for the pets array should be taking in 
    $pets = array(
        "id" => $row["id"],
        "name" => $row["name"],
        "color" => $row["color"],
        "breed" => $row["breed"],
        "is_checked_in" => $row["is_checked_in"],
    );

    //adds the values to the pets array 
    array_push($pets_arr["pets"], $pets);
   }
    //response with 200
        http_response_code(200);
    // response with pet array 
        echo json_encode($pets_arr);

    } else {
    // response with 404 
        http_response_code(404); 
    // key message send no pets 
        echo json_encode(array("message" => "no pets"));
    }

 




