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
           // query to insert record
        $query = "INSERT INTO pet (name, breed, color, is_checked_in)
        VALUES (:name, :breed, :color, :is_checked_in);";
        // prepare query
        $stmt = $this->conn->prepare($query);
        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->breed = htmlspecialchars(strip_tags($this->breed));
        $this->color = htmlspecialchars(strip_tags($this->color));
        $this->is_checked_in = htmlspecialchars(strip_tags($this->is_checked_in));
        // bind values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':breed', $this->breed);
        $stmt->bindParam(':color', $this->color);
        $stmt->bindParam(':is_checked_in', $this->is_checked_in);
        // execute query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function delete() {

        $query = "DELETE FROM pet WHERE id = ?";
      
        // prepare query
        $stmt = $this->conn->prepare($query);
     
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
     
        // bind id of record to delete
        $stmt->bindParam(1, $this->id);
     
        // execute query
        if($stmt->execute()){
            return true;
        }
     
        return false;
    }
}