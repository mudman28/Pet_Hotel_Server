<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


include_once '../config/database.php';
include_once '../objects/Owner.php';


$database = new Database();
$db = $database->getConnection();


$owner = new Owner($db);


$stmt = $owner->read();
$num = $stmt->rowCount();


if ($num > 0) {
 
   $owner_arr = array();
   $owner_arr["owners"] = array();


   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
     

    //   extract($row);
      $owner_item = array(
         "id" => $row["id"],
         "owner_name" => $row["owner_name"],
         "count" => $row["count"],
      );
      array_push($owner_arr["owners"], $owner_item);
   }

   http_response_code(200);

   echo json_encode($owner_arr);

} else {
  
   http_response_code(404);
   
   echo json_encode(
      array("message" => "No products found.")
   );
}