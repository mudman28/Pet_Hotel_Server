<?php
class owner
{


    //database connection & table
    private $conn;
    private $table_name = "pet"; 

    //object props
    public $id; 
    public $pet_name; 
    public $pet_color;
    public $pet_breed;
    public $checked_in; 

    public function __construct($db)
    {
        $this->conn= $db; 
    }

    //get products
    function fetch()
    {
        $query = "pet_hotel";
    }
}


function read() {

    $query = "SELECT * FROM " . $table_name . ";"; 

    $stmt = $this->conn->prepare($query);

    $stmt->execute(); 
    return $stmt; 

}

function create() {

}

function delete() {

}
//routes writen below 