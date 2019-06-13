<?php

class Pet {

    //database connection & table
    private $conn;
    public $table_name = "pet"; 

    //object props
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
    function fetch()
    {
        $query = "pet_hotel";
    }

    //routes writen below 
    function read() {

        $query = "SELECT * FROM " . $this->table_name . ";"; 

        $stmt = $this->conn->prepare($query);

        $stmt->execute(); 
        return $stmt; 

    }

    function create() {
           // query to insert record
        $query = INSERT INTO pet (name, breed, color, is_checked_in, owner_id)
        VALUES (:pet_name, :pet_color, :pet_breed, :checked_in);";
        // prepare query
        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->pet_name = htmlspecialchars(strip_tags($this->pet_name));
        $this->pet_color = htmlspecialchars(strip_tags($this->pet_color));
        $this->pet_breed = htmlspecialchars(strip_tags($this->pet_breed));
        $this->checked_in = htmlspecialchars(strip_tags($this->checked_in));
        // bind values
        $stmt->bindParam(':pet_name', $this->pet_name);
        $stmt->bindParam(':pet_color', $this->pet_color);
        $stmt->bindParam(':pet_breed', $this->pet_breed);
        $stmt->bindParam(':checked_in', $this->checked_in);
        // execute query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function delete() {

    }
}