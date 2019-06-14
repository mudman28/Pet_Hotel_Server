<?php

class Pet {

    //cannot acces conn outside pet class
    private $conn;

    //visibility modifier, name set to pet database
    public $table_name = "pet"; 

    // visibility modifier, anyone can access these 
    // colonms in table 
    public $id; 
    public $name; 
    public $color;
    public $breed;
    public $is_checked_in; 

    public function __construct($db)
    {
        $this->conn= $db; 
    }

    //get products
    // function fetch()
    // {
    //     $query = "pet_hotel";
    // }

    //routes writen below 
    function read() {

        $query = "SELECT * FROM " . $this->table_name . ";"; 

        $stmt = $this->conn->prepare($query);

        $stmt->execute(); 
        return $stmt; 

    }

    function create() {

    }

    function delete() {

    }
}