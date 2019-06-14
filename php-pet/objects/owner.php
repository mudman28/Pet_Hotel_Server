<?php
class owner
{

    //cannot modifiy conn
    private $conn;
    // private $table_owner = "owners"; 

    //cannot modify id 
    public $id; 
    // public $owner_name; 

    public function __construct($db) {
        $this->conn= $db; 
    }

    //get owners
    function read() {
        //creating query 
        $query = "SELECT * FROM owner.id, owner.name FROM owner 
        JOIN pets ON owner.id = pets.owner.id 
        GROUP BY owner.id, owner.name
        ORDER BY owner.id;";

        //preparing the query 
        $stmt = $this->conn->prepare($query);

        //executes the query 
        $stmt->execute(); 
        return $stmt; 

        $stmt->close(); 
        $conn->conn(); 

    }

    function create() {
 
    //creating the query h
    $query = "INSERT INTO owner (name) VALUES (:name) ";

    //preparing the query 
    $stmt = $this->conn->prepare($query); 


    //Sanitation purposes 
    // strip_tags used to remove HTML tags or content
    // htmlspecialchars convert special characters into HTML entities
    $this->name = htmlspecialchars(strip_tags($this->name)); 

    //binding name to this 
    $this->bindParam('name', $this->name); 

    //if exucte isn't falsy, run 
    if($stmt->execute()) {

    }

    // executes  query with the connection method 
    $stmt->execute(); 
    return $stmt; 

    // $stmt->close(); 
    // $conn->close(); 
    }

    function delete() {

            // $query = "DELETE FROM owner WHERE id = "



    }

}

//routes enterd below -- delete, read, post